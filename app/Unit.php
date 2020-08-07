<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TutorResetPasswordNotification;

class Unit extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'unit';
    protected $guard = 'unit';

    protected $fillable = [
        'nama_unit', 'slug', 'alamat', 'deskripsi', 'gambar_unit', 'password',
        'status', 'whatsapp', 'telegram', 'instagram', 'email', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TutorResetPasswordNotification($token));
    }


    protected $dates = ['deleted_at'];
}