<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArchive extends Model
{
    use HasFactory;
    protected $table = 'user_archive';
    protected $fillable = [
        'last_name',
        'first_name',
        'skill',
        'undsen_zahirgaa',
        'club',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function setPasswordAttribute($value){
        $this->attribute['password'] = Crypt::encryptString($value);
    }

    public function getPasswordAttribute($value){
        try {
            return Crypt::decryptString($value);
        }catch(\Exception $e){
            return $value;
        }
    }*/
}
