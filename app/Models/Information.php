<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = "information";
    protected $fillable = [
        'name', 'logo', 'phone', 'email', 'address', 'map', 'open_time', 'close_time', 'facebook', 'youtube'
    ];
}
