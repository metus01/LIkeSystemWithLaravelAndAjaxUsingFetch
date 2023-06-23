<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedByLoggedUser() : bool
    {
        return $this->likes->where('user_id' , Auth::id())->isEmpty() ? false : true;
    }
}
