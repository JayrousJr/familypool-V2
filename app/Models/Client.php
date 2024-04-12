<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'name', 'email', 'nationality', 'city', 'state', 'street', 'phone', 'category', 'active'];

    public function client_categories()
    {
        return $this->belongsTo(ClientCategory::class, 'id', 'category');
    }
    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'client_id', 'user_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'user_id');
    }
}
