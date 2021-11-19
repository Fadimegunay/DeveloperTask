<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\Services;
use App\Libraries\Providers\Provider1;
use App\Libraries\Providers\Provider2;
use App\Models\Task;

class ImportTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import task from API';

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
        foreach(Services::providers as $key =>$provider) {
            $service = null;
            switch($key) {
                case 'provider1':
                    $service = new Provider1();
                    break;
                case 'provider2':
                    $service = new Provider2();
                    break;
            }
            $tasks = $service->getTasks($provider);
            foreach($tasks as $task) {
                $newTask = new Task();
                $newTask->slug = $task->slug;
                $newTask->task = $task->task;
                $newTask->level = $task->level;
                $newTask->duration = $task->duration;
                $newTask->save();
            }
        }
        
    }
}
