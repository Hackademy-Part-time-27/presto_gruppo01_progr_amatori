<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome () 
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        //dd($announcements);    
        return view ('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('pages.categoryShow', compact('category'));
    }
}
