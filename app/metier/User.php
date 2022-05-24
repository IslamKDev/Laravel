<?php
namespace App\metier;

use DB;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject {
use Notifiable;
//On déclare la table Users
protected $table = 'users';
public $timestamps = false;
protected $guarded = ['id'];
protected $fillable = [
'id',
'name',
'email',
'password',
'last_update',
'user_update',
'role',
'id_visiteur',
];
protected $hidden = [
'password'    ];
public $timetamps = true;

public function getAuthPassword()
{
return $this->password;
}
public function getJWTIdentifier()
{
return $this->getKey();
}
public function getJWTCustomClaims()
{
return [];
}
}
?>
