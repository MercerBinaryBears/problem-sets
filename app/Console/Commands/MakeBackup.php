<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a backup of the database and PDF files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file_list = [
            'storage/practice_cache',
            'storage/problem_cache',
            'storage/problem_set_cache',
            'storage/split_pages',
            'storage/uploads',
            'database/database.sqlite'
        ];

        $backup_name = 'backup_' . date('Y_m_d_hi') . '.tgz';
        $files = implode(' ', $file_list);

        `tar -czvf $backup_name $files`;
    }
}
