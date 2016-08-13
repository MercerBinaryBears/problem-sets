<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CompetitionProblemSet;

class ValidateUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:validate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validates all uploads on the system';

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
        $pdfs = glob(storage_path('uploads') . '/*');
        foreach($pdfs as $pdf) {
            $competition = CompetitionProblemSet::whereFilename(basename($pdf))->first();
            $id = $competition ? $competition->id : null;
            $name = $competition ? $competition->name : null;
            $version = $this->pdfVersion($pdf);

            if($version > 1.4) {
                $this->error("$id => $name is not valid (PDF version $version)");
            } else {
                $this->info("$id => $name is valid (PDF version $version)");
            }
        }
    }

    public function pdfVersion($file) {
        $handle = fopen($file, 'r');
        $bytes = fread($handle, 10); 
        fclose($handle);

        return floatval(substr($bytes, 5, 7));
    }
}
