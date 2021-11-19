<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DeveloperTask;
use App\Models\Task;

class Developer extends Model
{
    use HasFactory;

    
    public function getDuration() 
    {
        $taskIds = DeveloperTask::where('developer_id', $this->id)
                                    ->get()->pluck('task_id')->toArray();

        $duration = Task::whereIn('id', $taskIds)
                            ->sum('duration');
        
        return $duration;
    }
}
