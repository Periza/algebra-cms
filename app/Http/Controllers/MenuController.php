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
        return view('menus.create');
    }

    public function saveNewMenu(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->save();

        return redirect("/menus")->with('success', 'Menu added!');
    }

    public function saveMenu(Request $request, Menu $menu)
    {
        $menu->name = $request->name;
        
        $menu->save();

        return redirect("/menus")->with('success', 'Menu updated!');
    }

    public function deleteMenu(Request $request,  Menu $menu)
    {
        $menu->delete();
        return redirect('/menus')->with('success', 'Menu deleted');;
    }

    public function menuEditView(Menu $menu)
    {
        return view('menus.edit', [
            'menu' => $menu,
        ]);
    }

    public function addPostToMenuView()
    {
        return view('menus.menupostedit', [
            'menus' => Menu::get(), 'posts' => Post::get()
        ]);
    }

    function savePostToMenu(Request $request){
            $menu = Menu::find($request->menu_id);
            $post = Post::find($request->post_id);
            $menu->posts()->attach($post->id, ['order' => $request->order, 'name' => $request->name]);
        
            return redirect('/menus');
    }

    function deletePostFromMenu(Request $request, Menu $menu, Post $post){
        $menu->posts()->detach($post);
    
        return redirect('/menus');
    }
}
