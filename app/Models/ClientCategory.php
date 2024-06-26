<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category',
    ];

    public function categories()
    {
        return $this->hasMany(Client::class, "client_category_id", "id");
    }
}
