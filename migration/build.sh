#!/bin/bash
set -euo pipefail
IFS=$'\n\t'

tables=( \
    competition_problem_sets \
    languages \
    migrations \
    users \
    password_resets \
    problems \
    tags \
    solutions \
    problem_tag \
    practice_problem_sets \
    practice_problem_set_problem
    )

echo "Exporting..."
mkdir -p dumps
rm -f dumps/*
for table in ${tables[@]}; do
    echo "SELECT * FROM $table;" | sqlite3 -cmd ".mode csv" -cmd ".output dumps/$table.csv" database.sqlite
done

echo "Building import query..."
full_import_query="START TRANSACTION;"
for table in ${tables[@]}; do
    query="LOAD DATA LOCAL INFILE '$table.csv' INTO TABLE $table FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\\r\\n';"
    full_import_query="$full_import_query $query"
done
full_import_query="$full_import_query COMMIT;"

echo $full_import_query > dumps/import.sql

mysql_container=`docker ps | grep mysql | cut -d' ' -f1`
echo "Uploading to mysql container $mysql_container..."
for f in `find dumps -type f`; do
    docker cp $f $mysql_container:/var/lib/mysql-files/
done

echo "Done. You'll need to mysql < import.sql from /var/lib/mysql-files on $mysql_container"
