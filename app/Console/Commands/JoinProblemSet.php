<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class JoinProblemSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'join:practice {practice_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Joins the connected problems for a given practice into a single pdf';

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
        $practice_id = $this->argument('practice_id');
        $practice = \App\PracticeProblemSet::find($practice_id);

        if($practice === null) {
            return $this->error("Practice (id=$practice_id) not found");
        }

        $output_file = $practice->full_path;

        $files = $practice->problems->map(function($problem) {
            return $problem->full_path;
        })->toArray();

        $pdf = new \App\Services\PdfService();
        $pdf->join($files, $output_file);

        $this->info(count($files) . " files joined for " . $practice->name);
    }
}
