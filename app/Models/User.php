<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class User extends Model implements Authenticatable {

    use BasicAuthenticatable;
    protected $fillable = ['email', 'password'];

    public function messages() {
        return $this->hasMany(Message::class)->latest();
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function follow($user) {
        return $this->follows()->where('followed_id', $user->id)->exists();
    }
};
?>