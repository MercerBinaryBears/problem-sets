<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SplitCompetitionProblemSetPdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'split:competition {competition_problem_set_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Splits a competition problem set up';

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
        $problem_set_id = $this->argument('competition_problem_set_id');
        $problem_set = \App\CompetitionProblemSet::find($problem_set_id);

        if($problem_set == null) {
            $this->error("Problem (id=$problem_set_id) not found");
            return;
        }

        $output_directory = storage_path('split_pages') . '/';
        $output_files = \App::make('App\Services\PdfService')->split($problem_set->full_path, $output_directory);
        $message = 'Split ' . $problem_set->name . ' into ' . count($output_files) . ' pages';
        \Log::info($message);
        $this->info($message);
    }
}
