<?php

namespace App\Models;

use App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['is_favorite'];

    public static function toBeFavoritedCount(){
        return Favorite::where('is_favorite', true)->count();
    }
}
