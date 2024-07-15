<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use function Livewire\on;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller
{
    
    // public function middleware():array{
    //     return [
    //         new Middleware('auth',  only: ['create']),
    //     ];
    
    
    // }
    public function create(){
        return view('article.create');
    }
    
    public function index(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);
        return view('article.index',compact('articles'));
    }
    
    public function show(Article $article){
        
        return view('article.show', compact('article'));
        
    }
    public function byCategory(Category $category){
        $articles = $category->articles->where('is_accepted', true);
        
        return view('article.byCategory' , compact('articles', 'category'));
    }
}
