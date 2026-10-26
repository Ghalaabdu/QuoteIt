<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['content'])]
class Quote extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes()
{
    return $this->hasMany(Like::class);
}


public function isLikedBy(?User $user)
{
    if (!$user) {
        return false;
    }
    return $this->likes->contains('user_id', $user->id);
}
}
