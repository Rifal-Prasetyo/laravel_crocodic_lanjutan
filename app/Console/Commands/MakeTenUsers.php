<?php

namespace App\Console\Commands;

use App\Models\User;
use FactoryCall;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeTenUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ten-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat Field 10 Users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        $this->info('10 Users has been created, 10 Pengguna sudah dibuat');
    }
}
