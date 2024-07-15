<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 my-5">
                <h1 class=" display-1 my-5 text-center fw-bold">{{ __('ui.categoryArticle') }}<span 
                class="fst-italic fw-bolder"> {{ __('ui.' . $category->name) }}</span></h1>
            </div>
        </div>
    </div>

    
    <div class="container-fluid">
        <div class="row  justify-content-center">
            @forelse ($articles as $article)

                    <x-card :article="$article" />

            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.noArticle')}}</h3>
                </div>
                <div class="col-6 text-center mt-5">
                    <a class="btn btn-dark" href="{{route('article.create')}}"><i class="fa-solid fa-plus"></i>     {{__('ui.publicArticleButton')}}</a>
            </div>
            @endforelse
        </div>
    </div>
           
    
</x-layout>
