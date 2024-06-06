<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $rejected_announcements = Announcement::where('is_accepted', false)->get();
        return view('revisor.index', compact('announcement_to_check', 'rejected_announcements'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('success', 'Complimenti, hai rifiutato l\'annuncio');
    }

    public function reviseAgainAnnouncement(Announcement $announcement){
        $announcement->is_accepted = null;
        $announcement->save();
        return redirect()->back()->with('success', 'L\'annuncio è stato inviato per una nuova revisone');
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect('/')->with('success', 'Complimenti! Hai Richiesto di diventare revisore correttamente');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('success', 'Complimenti! L\'utente è diventato revisore');
    }

    public function formRevisor(){
        return view('pages.formRevisore');
        
    }
}
