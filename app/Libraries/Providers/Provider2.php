<?php
namespace App\Libraries\Providers;

use GuzzleHttp\Client;
use App\Libraries\Task;
use Illuminate\Support\Str;

use App\Models\Task as Tasks;

class Provider2
{
    public function getTasks($base_uri)
    {
        $data = [];
        $client = new Client();
        $response = $client->get($base_uri);

        $contents = json_decode($response->getBody()->getContents());

        foreach($contents as $content) { 
            foreach($content as $key => $item) {
                $slug = Str::slug($key);
                $task_control = Tasks::where('slug', $slug)->exists();
                if(!$task_control) {
                    $task = new Task();   
                    $task->slug = $slug;
                    $task->task = $key;
                    $task->level = $item->level;
                    $task->duration = $item->estimated_duration;
                    
                    $data [] = $task;
                }  
            }
        }
        return $data;
    }
}