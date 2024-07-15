<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateArticle extends Component
{

    use WithFileUploads;

    #[Validate('required|min:5', message: 'Il :attribute è richiesto')]
    public $title;
    #[Validate('required|numeric', message: 'Il :attribute è richiesto')]
    public $price;
    #[Validate('required|min:10', message: 'Il :attribute è richiesto')]
    public $description;

    public $article;

    public $category;

    public $images = [];
    public $temporary_images;

    public function store()
    {

        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public')
                ]);
                // dispatch(new ResizeImage($newImage->path, 1400, 1400));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 1400, 1400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),

                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
        }

        session()->flash('message', 'Articolo Pubblicato');
        $this->cleanForm();
    }




    public function render()
    {
        return view('livewire.create-article');
    }


    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:4',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($image)
    {
        if (in_array($image, array_keys($this->images))) {
            unset($this->images[$image]);
        }
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->category = '';
        $this->images = [];
    }
}
