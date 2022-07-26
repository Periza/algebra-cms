<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    // za journalista
    public function forUser(User $user) {
        return Post::where('user_id', $user->id)
                            ->orderBy('created_at', 'asc')
                            ->get();
    }

    // napraviti for admin, for editor
    public function forAdmin() {
        return Post::orderBy('created_at', 'asc')->get();
    }
}