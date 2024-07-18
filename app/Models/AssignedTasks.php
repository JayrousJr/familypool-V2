<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignedTasks extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        "service_request_id",
        "user_id",
        "status",
        "feedback",
        "image_before",
        "image_after",
        "task_id"
    ];
    public function taskAssigned()
    {
        return $this->belongsTo(Task::class, "task_id", "id");
    }
}
