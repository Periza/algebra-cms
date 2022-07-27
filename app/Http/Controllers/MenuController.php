<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Post;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menus;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMenusView(Request $request)
    {
        return view('menus.menus', [
            'menus' => Menu::get()
        ]);
    }

    public function getNewMenuView()
    {
        return view('newmenu');
    }

    public function saveNewMenu(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->save();

        return redirect("/menus");
    }

    public function saveMenu(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        
        $menu->save();

        return redirect("/menus");
    }

    public function deleteMenu(Request $request,  Menu $menu)
    {
        $menu->delete();
        return redirect('/menus');
    }

    public function menuEdit(Menu $menu)
    {
        return view('menuEdit', [
            'menu' => $menu,
        ]);
    }

    public function addPostToMenuView()
    {
        return view('menuPostEdit', [
            'menus' => Menu::get(), 'posts' => Post::get()
        ]);
    }

    function savePostToMenu(Request $request){
            $menu = Menu::find($request->menu_id);
            $post = Post::find($request->post_id);
            $menu->posts()->attach($post->id, ['order' => $request->order, 'name' => $request->name]);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Post je dodan!');
        
            return redirect('/menus');
    }

    function deletePostFromMenu(Request $request, Menu $menu, Post $post){
        $menu->posts()->detach($post);
    
        return redirect('/menus');
    }
}
