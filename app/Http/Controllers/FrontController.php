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
        $acceptedAnnouncements = $category->announcements()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        
        return view('pages.categoryShow', ['category'=> $category, 'acceptedAnnouncements'=>$acceptedAnnouncements]);
    }

    public function searchAnnouncements(Request $request)
    {

        $announcements = Announcement::Search($request->searched)->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('pages/searched-announcement', ['announcements'=>$announcements, 'request'=>$request->searched]);
    }

    public function setLanguage($lang)
    {
     session()->put('locale', $lang);
     
     return redirect()->back();
        
    }    
}
