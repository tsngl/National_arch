<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleteArchive extends Model
{
    use HasFactory;
    protected $table = 'athlete_archive';
    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'skill',
        'undsen_zahirgaa',
        'club',
        'phone',
    ];
}
