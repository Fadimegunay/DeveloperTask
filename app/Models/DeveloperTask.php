<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'developer_id',
        'week'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
