<?php

namespace App\Models;

use App\Jobs\MarkTaskOverdue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "service_request_id",
        "user_id",
        "status",
        "comments",
    ];
    public function serviceTask()
    {
        return $this->belongsTo(ServiceRequest::class, "service_request_id");
    }
    public function userTask()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    function assignedtasks()
    {
        return $this->hasMany(AssignedTasks::class, "task_id");
    }

    protected static function booted()
    {
        static::created(function ($task) {
            // dd($task);
            MarkTaskOverdue::dispatch($task)->delay(now()->addMinutes(3));
        });
    }
    public function checkAndMarkOverdue()
    {
        if (Carbon::now()->diffInMinutes($this->created_at) >= 1) {
            $this->update(['comments' => "Overdue"]);
        }
    }
}
