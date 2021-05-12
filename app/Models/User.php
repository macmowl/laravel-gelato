<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class User extends Model implements Authenticatable {

    use BasicAuthenticatable;
    protected $fillable = ['email', 'password'];

    public function cakes() {
        return $this->hasMany(Cake::class)->latest();
    }
};
?>