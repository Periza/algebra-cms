<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $posts;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth')->except(['postDetails']);
        $this->posts = $postRepository;
    }

    public function getPostsView(Request $request) {
        if(auth()->user()->role->name === 'Administrator' || auth()->user()->role->name === 'Editor') {
            $postsForView = $this->posts->forAdmin();
        } else {
            $postsForView = $this->posts->forUser($request->user());
        }
        
        return view('posts.posts', ['posts' => $postsForView]);
    }

    public function getNewPostView() {
        return view('posts.newpost');
    }

    public function saveNewPost(PostRequest $request) {
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;

        $post->user_id = Auth::user()->getId();
        $file = $request->file('image');
        $destinationPath = '../public/uploads';
        $post->image = $post->name.'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $post->name.'_'.$file->getClientOriginalName());

        $post->save();

        return redirect(route('postsView'))->with('success', 'Post added!');
    }

    public function savePost(Request $request, Post $post) {
        $post->name = $request->name;
        $post->description = $request->description;

        dd($post->id, $request->id);

        $post->user_id = Auth::user()->getId();
        $file = $request->file('image');
        $destinationPath = '../public/uploads';
        $post->image = $post->name.'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $post->name.'_'.$file->getClientOriginalName());

        $post->save();

        return redirect(route('postsView'))->with('success', 'Post '.$post->name.' saved!');

    }

    public function editPostView(Post $post) {
        return view('posts.editpost', ['post' => $post]);
    }

    public function postDetails(Post $post) {
        return view('posts.post', ['post' => $post]);
    }

    public function deletePost(Post $post) {
        $post->delete();
        return redirect(route('postsView'))->with('success', 'Post '.$post->name.' deleted!');
    }

}
