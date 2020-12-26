<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class WebController extends Controller
{
    public function main() {
    	$news_latest = News::orderBy('created_at', 'DESC')->where("is_published", 1)->get();
    	$categories = Category::all();
    	return view("web.home", compact('news_latest', 'categories'));
    }

    public function getNewsByCatID($catId) {
    	$categories = Category::all();
    	$news_latest = \DB::table("news")->where("cat_id", $catId)->orderBy('created_at', 'DESC')->get();
    	return view("web.home", compact('news_latest', 'categories'));
    } 
}
