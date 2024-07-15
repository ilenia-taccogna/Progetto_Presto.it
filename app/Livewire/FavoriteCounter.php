<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Favorite;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class FavoriteCounter extends Component
{

    public $count;
    
    #[On('toggle-favorite')]
    public  function toBeFavoritedCount(){
        // return Article::where('is_favorite', true)->count();
        return Auth::user()->favorites()->get()->count();
    }
    
    public function mount(){
        $this->count = $this->toBeFavoritedCount();
        
    }

    public function hydrate(){
        $this->count = $this->toBeFavoritedCount();

    }

    public function render()
    {
        return view('livewire.favorite-counter');
    }


}
