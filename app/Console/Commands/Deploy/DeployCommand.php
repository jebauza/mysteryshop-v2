<?php

namespace App\Console\Commands\Deploy;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class DeployCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'launch:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este script se lanza cada vez que se hace deploy.';

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
        $this->addNewPermissionsIfExists();
    }

    /*
     * Add new permissions in bbdd
     */
    public function addNewPermissionsIfExists()
    {
        try {
            DB::transaction(function ()
            {
                foreach(config('mysteryshop.permissions') as $p)
                {
                    $permission = Permission::firstOrCreate(['name' => $p]);
                }

                $this->info('Permisos actualizados con éxito');
            });
        } catch (Exception $e) {
            //throw new \Exception(substr($e->getMessage(),0,500));
            $this->error($e->getMessage());
        }
    }
}
