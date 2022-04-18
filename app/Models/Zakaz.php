<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
    use HasFactory;
    protected $table='zakazs';
    protected $fillable=[
        'delivery',
        'payment',
        'city',
        'street' ,
        'house',  
        'flat',    
        'com',
        'status',
        'sum',	
        'user_id',
        'user_name',
        'phone',
        'spare',
        'user_surname'
    ];
}
