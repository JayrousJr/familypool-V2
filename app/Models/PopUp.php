<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PopUp extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['head', 'action', 'page_to_display', 'body'];
}
