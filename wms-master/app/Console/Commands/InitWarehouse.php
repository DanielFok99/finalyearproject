<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitWarehouse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial Warehouse';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Working....');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed', [
            '--class' => '\Database\Seeders\AppSeeder',
            '--force' => true
        ]);
        $this->info('Done');
    }
}
