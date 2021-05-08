<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competition';
    protected $fillable = [
        'competition_name',
        'rank',
        'status',
    ];

    public function athletes(){
        return $this->belongsToMany(Athletes::class)->withTimestamps();
    }
}
