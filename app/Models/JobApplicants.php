<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicants extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'email', 'nationality', 'city', 'state', 'street', 'phone', 'zip', 'age', 'birthdate', 'socialsecurity', 'socialsecurityNumber', 'ainNumber', 'days', 'starttime', 'endtime', 'startdate', 'workperiod', 'workhours', 'smoke', 'licence', 'licenceNumber', 'issueddate', 'expiredate', 'issuedcity', 'transport', 'hire'
    ];
}
