<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\resetEmail;

class person extends Model implements AuthenticatableContract,
CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use Notifiable;
    protected $table = 'person';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'IDPerson', 'person',
    ];
    
    
    public function sendPasswordResetNotification($token)
    {
     $this->notify(new resetEmail($token));
    }
}
