<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        $article_to_annull= Article::whereNotNull('is_accepted')->get()->last();
        return view('revisor.index', compact('article_to_check','article_to_annull'));
    }
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()
            ->with('message', "hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()
            ->with('message', "hai rifiutato l'articolo $article->title");
    }
    public function annull(Article $article)
    {
        $article->setAccepted(null);
        return redirect()->back()
            ->with('message', "hai annulato l'ultima operazione");
    }

    public function becomeRevisor(){
        Mail::to('asia92candido@gmail.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti, Hai richiesto di diventare revisore');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
}
}