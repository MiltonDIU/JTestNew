<?php

namespace App\Models;

use App\Authorizable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_token','role_id','mobile','gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function verified()
    {
        $this->verified = 1;
        $this->status = 1;
        $this->email_token = null;
        $this->save();
    }
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }
    public function user_schedule(){
        return $this->hasMany('App\Models\UserSchedule');
    }
    public function notice(){
        return $this->hasMany('App\Models\Notice');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
