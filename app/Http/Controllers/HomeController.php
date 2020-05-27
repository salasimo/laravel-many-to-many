<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\InfoUser;
use App\Page;
use App\Tag;
use App\Photo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // TEST DI FUNZIONAMENTO RELAZIONI TRA MODEL
        // =============================================
        // $user = User::find(1);
        // dd($user);
        // //dd($user->categories);
        // //dd($user->pages);

        // $category = Category::find(1);
        // //dd($category->user);

        // $page = Page::find(1);
        // //dd($page->tags);

        // $photo = Photo::find(1);
        // //dd($photo->pages);
        // =========================================
        return view('home');
    }
}
