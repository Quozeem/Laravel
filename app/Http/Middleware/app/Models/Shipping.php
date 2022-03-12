<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
class Shipping extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //protected $guard = 'admin';
    protected $table="shipping";
    protected $fillable = [
        'rates',
        'state_id',
        'states_name',
       
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    public function user(){
        return $this->belongTo(User::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
}
