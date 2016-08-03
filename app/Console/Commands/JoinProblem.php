<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class JoinProblem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'join:problem {problem_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Joins the needed files for PDF generation';

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
        $problem_id = $this->argument('problem_id');
        $problem = \App\Problem::find($problem_id);

        if($problem === null) {
            return $this->error("Problem (id=$problem_id) not found");
        }

        $output_file = storage_path('problem_cache') . "/problem_$problem_id.pdf";

        // get the list of split pages that need to be built
        $pdf_service = \App::make('\App\Services\PdfService');
        $competition_filename = $problem->competitionProblemSet->filename;
        $pages = [];
        for($i = $problem->start_page; $i <= $problem->end_page; $i++) {
            $page_name = $pdf_service->pageName($competition_filename, $i);
            $pages[] = storage_path('split_pages') . "/$page_name";
        }

        $pdf_service->join($pages, $output_file);
        $this->info(count($pages) . ' pages joined for ' . $problem->name);
    }
}
