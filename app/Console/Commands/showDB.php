<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class showDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-d-b';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispaly the current database name';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info("Current db is ". DB::connection()->getDatabaseName());
    }
}
