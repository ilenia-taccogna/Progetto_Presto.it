<x-layout>
    <div class="container-fluid ">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 ">
                @if($favorites->isEmpty())
                <p class=" display-1 my-3  text-center create-custom-h1">{{ __('ui.noFavorites')}}</p>
                @else
                <h1 class=" display-1 my-3  text-center create-custom-h1">{{ __('ui.myFavorites')}}</h1>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row  justify-content-center">
            @forelse ($favorites as $article)

                    <x-card :article="$article" />

            @empty
                <div class="col-12">
                    <h3 class="text-center">{{ __('ui.noArticle')}}</h3>
                </div>
            @endforelse
        </div>
    </div>

    </div>


</x-layout>