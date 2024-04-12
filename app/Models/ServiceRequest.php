<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'street', 'city', 'state', 'description', 'service', 'phone', 'client_id', 'email'
    ];
}
