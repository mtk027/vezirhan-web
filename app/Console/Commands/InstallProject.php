<?php

namespace App\Console\Commands;

use App\Helpers\InstallHelper;
use App\Http\Controllers\Dashboard\SystemPageController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proje Kurulum Komutu';

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
     * @return int
     */
    public function handle()
    {
        InstallHelper::save_data_local();
        InstallHelper::save_data_database();
        dd("Proje Kurulumu Başarılı.");
    }
}
