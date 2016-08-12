<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Artisan;
use App\CompetitionProblemSet;
use App\Problem;
use App\PracticeProblemSet;

class RebuildPdfsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info("Doing competitions...");
        CompetitionProblemSet::lists('id')->each(function($competition_problem_set_id) {
            try {
                Artisan::call('pdf:split:competition', ['competition_problem_set_id' => $competition_problem_set_id]);
            } catch(\Exception $e) {
                $name = CompetitionProblemSet::find($competition_problem_set_id)->name;
                $this->error("Error for $name: " . $e->getMessage());
            }
        });

        $this->info('Doing problems...');
        Problem::lists('id')->each(function($problem_id) {
            try {
                Artisan::call('pdf:join:problem', ['problem_id' => $problem_id]);
            } catch(\Exception $e) {
                $name = Problem::find($problem_id)->name;
                $this->error("Error for $name: " . $e->getMessage());
            }
        });
    }
}
