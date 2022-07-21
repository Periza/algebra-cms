<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    public function posts() {
        return $this->hasMany(Post::class, 'menu_post', 'menu_id', 'post_id')->orderBy('order', 'ASC')->withPivot(['order', 'name']);
    }
}
