<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model implements Authenticatable {

    use Notifiable;
    use BasicAuthenticatable;
    protected $fillable = ['email', 'password', 'username'];

    public function cakes() {
        return $this->hasMany(Cake::class)->latest();
    }
};
?>
