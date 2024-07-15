<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $user = Auth::user();

        if ($user->favorites()->where('article_id', $id)->exists()) {
            $user->favorites()->detach($id);
        } else {
            $user->favorites()->attach($id);
        }

        return back();
    }

    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->get();

        return view('favorites.index', compact('favorites'));
    }
}