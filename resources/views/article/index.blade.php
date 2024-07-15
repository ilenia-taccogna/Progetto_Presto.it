<x-layout>
    <div class="container-fluid ">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 ">
                <h1 class=" display-1 my-3  text-center create-custom-h1">{{__('ui.allArticles')}}</h1>
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
            @endforelse
        </div>
    </div>
    <div class="justify-content-center d-flex">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
    </div>












</x-layout>
