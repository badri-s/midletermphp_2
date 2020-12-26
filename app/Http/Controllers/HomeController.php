<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Auth;

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
        $cats = Category::all();
        $all_news = News::paginate(10);
        return view('home', compact('cats', 'all_news'));
    }

    public function createCategory(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255'
        ]);
        $category = new Category($request->except("_token"));
        $category->save();
        return \Redirect::back()->withStatus("დაემატა"); 
    }


    public function createNews(Request $request) {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $news = new News($request->except("_token"));
        $news->publisher_id = Auth::id();
        $news->is_published = false;
        $news->save();
        return \Redirect::back()->withStatus("დაემატა");
    }

    public function publishNewsByid($id) {
        $news = News::find($id);
        $news->is_published = 1;
        $news->save();
        return response()->json(["res" => true]);
    }


}
