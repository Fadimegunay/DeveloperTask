<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Developer;
use App\Models\DeveloperTask;
use Illuminate\Support\Facades\DB;

class DeveloperTaskController extends Controller
{
    public function index()
    {
        $this->developerToTask();
        $data = [];
		$data['developerTasks'] = DeveloperTask::orderBy('week')->get();
		return view('developer-task.index', $data);
    }

    private function developerToTask()
    {
        $developers = Developer::orderByDesc('level')->get();
        
        $tasks = Task::select('*', DB::raw('level*duration AS sumDuration'))
                ->whereNotIn('id',
                    DeveloperTask::get()->pluck('task_id')->toArray()
                )
                ->orderByDesc('sumDuration')->get();
        foreach ($tasks as $key => $task) {
            $developer = $developers[$key%5];
            $duration = $developer->getDuration();
        
            $duration += ceil($task->sumDuration/$developer->level);

            $task->developerTask()->create([
                'developer_id' => $developer->id,
                'week' => floor($duration/45)+1
            ]);
        }
    }
}
