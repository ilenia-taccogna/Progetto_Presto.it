<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public $article;
    public $favorited;

    public function mount(Article $article)
    {
        $this->article = $article;
        
        $this->favorited = Auth::user()->favorites->contains($article->id);
    }

    public function toggleFavorite()
    {
        $user = Auth::user();

        if ($user->favorites->contains($this->article->id)) {
            $user->favorites()->detach($this->article->id);
            $this->favorited = false;
        } else {
            $user->favorites()->attach($this->article->id);
            $this->favorited = true;
            
        }
        $this->dispatch('toggle-favorite');
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }

}
