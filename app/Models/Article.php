<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['title','description','price','category_id','user_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category'=>$this->category,
            
        ];
    }

    public function images():HasMany{
        return $this->hasMany(Image::class);
    }

    // logica preferiti
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public static function toBeFavoritedCount(){
        return Article::where('is_favorite', true)->count();
    }
}
