<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class newFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates a new php File';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $file = fopen(public_path('Example.blade.php'), 'w');
        fwrite($file, "// This is a comment");
        fclose($file);

        if($file){
            $this->info("File exists already");
        } else {
            $this->info("Success:File is created in public directory");
        }
    }
}
