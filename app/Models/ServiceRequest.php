<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'street', 'city', 'zip', 'description', 'service', 'phone',  'email', "user_id"
    ];

    public function techAssign()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    function tasks()
    {
        return $this->hasMany(Task::class, "service_request_id");
    }
}
