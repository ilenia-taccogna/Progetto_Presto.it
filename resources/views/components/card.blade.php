<div class="col-12 col-md-3 mb-5 rounded shadow border position-relative mx-auto" style="width:auto;">



    <div class="card my-2" style="width: 18rem;" style="height: 18rem;">
        @if ($article->images->count() > 0)
            <div id="carouselExample-{{ $article->id }}" class="carousel slide">
                <div class="carousel-inner position-relative">
                    <div class="carousel-item active ">
                        <img src="{{ $article->images->first()->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
                    </div>
                    @foreach ($article->images as $key => $image)
                        @if ($key != 0)
                            <div class="carousel-item">
                                <img src="{{ $image->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample-{{ $article->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample-{{ $article->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img src="https://picsum.photos/200" class="card-img-top" alt="..." height="300px">
        @endif
    </div>

    <div class="card-body mt-3 ">
        <h5 class="card-title ms-3 my-3">{{ $article->title }}</h5>
        @if ($article->category)
        <a class="a-category-custom ms-3"
        href="{{ route('byCategory', ['category' => $article->category]) }}">#{{ __('ui.' . $article->category->name) }}</a>
        @endif

        {{-- @foreach ($article->categories as $category)
        <span>{{ $category->name }}</span>
        
        @endforeach --}}

        <p class="card-text ms-3 mt-3">{{ $article->price }}€</p>
        {{-- <p class="card-text ms-3">{{ $article->created_at }}</p> --}}
    <div class="d-flex justify-content-between">
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-dettaglio d-flex text-center align-items-center m-2">{{ __('ui.detail') }}</a>

        {{-- <a class="btn btn-outline-info"
            href="{{ route('byCategory', ['category' => $article->category]) }}">{{ __('ui.' . $article->category->name) }}</a> --}}


        {{-- pulsante favoriti --}}
        @auth
        <livewire:favorite-button :article="$article" />
        @endauth
        </div>
    </div>

</div>

{{-- <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
        </div>
        
    </div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div> --}}
