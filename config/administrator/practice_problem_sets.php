<?php

return array(
    'title' => 'Practice Problem Sets',

    'single' => 'Practice Problem Set',

    'model' => 'App\PracticeProblemSet',

    'columns' => array(
        'name' => array(
            'title' => 'Name',
        ),
    ),

    'filters' => array(
        'name' => array(
            'title' => 'Name'
        )
    ),

    'edit_fields' => array(
        'name' => array(
            'title' => 'Name'
        ),

        'problems' => array(
            'title' => 'Problems',
            'type' => 'relationship',
            'name_field' => 'name'
        )
    ),
);
