<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athletes_Competition extends Model
{
    use HasFactory;
    protected $table = 'athletes_competition';
    protected $fillable = [
        'athletes_id',
        'competition_id',
        'score',
    ];
}
