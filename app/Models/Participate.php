<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;

    protected $table = 'participate';
    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'skill',
        'club',
    ];
}
