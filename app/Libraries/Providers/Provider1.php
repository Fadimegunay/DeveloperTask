<?php
namespace App\Libraries\Providers;

use GuzzleHttp\Client;
use App\Libraries\Task;
use Illuminate\Support\Str;

use App\Models\Task as Tasks;

class Provider1
{
    public function getTasks($base_uri)
    {
        $data = [];
        $client = new Client();
        $response = $client->get($base_uri);

        $contents = json_decode($response->getBody()->getContents());
        foreach($contents as $content) {
            $slug = Str::slug($content->id);
            $task_control = Tasks::where('slug', $slug)->exists();
            if(!$task_control) {
                $task = new Task();
                $task->slug = $slug;
                $task->task = $content->id;
                $task->level = $content->zorluk;
                $task->duration = $content->sure; 
                
                $data [] = $task;
            }
           
        }
        return $data;
    }
}