<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    // protected $fillable = ['user_id', 'active', 'category',];
    protected $fillable = ['name', 'email', 'nationality', 'zip', 'city', 'state', 'street', 'phone', 'client_category_id', 'active'];
    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'user_id', 'client_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(ClientCategory::class, 'client_category_id');
    }
}
