<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 my-5">
                <h1 class=" display-2  text-center create-custom-h1">{{ __('ui.detail') }}</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center  align-items-center">
            <div class="col-12 col-md-3  mb-3">
                {{-- @if ($article->images->count() > 0)
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($article->images as $key=>$image)
                        <div class="carousel-item @if($loop->first) active @endif">

                            <img src="{{$article->images->isNotEmpty()? $article->images->first()->getUrl(1400,1400) : 'https://picsum.photos/200'}}" class="card-img-top" alt="...">


                        </div>
                        
                        @endforeach
                    </div>
                    @if ($article->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            @endif
        </div>
        @else
        <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg" alt="" class="img-fluid">
        @endif
         --}}







            {{-- swiper --}}

<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
    @if ($article->images->count() > 0)
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ $article->images->first()->getUrl(1400, 1400) }}" class="card-img-top img-fluid img-swiper-custom" alt="..." height="300px" id="zoom">
      </div>
      @foreach ($article->images as $key => $image)
                        @if ($key != 0)
                            <div class="swiper-slide">
                                <img src="{{ $image->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
                            </div>
                        @endif
                    @endforeach
     
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    @endif
  </div>

  <div thumbsSlider="" class="swiper mySwiper">
    @if ($article->images->count() > 0)
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ $article->images->first()->getUrl(1400, 1400) }}" class="card-img-top img-fluid img-swiper-custom-small" alt="..." height="300px">
      </div>
      @foreach ($article->images as $key => $image)
      @if ($key != 0)
          <div class="swiper-slide">
              <img src="{{ $image->getUrl(1400, 1400) }}" class="card-img-top img-swiper-custom-small" alt="..." height="300px" id="img">
          </div>
      @endif
  @endforeach
    </div>
@endif
  </div>

{{-- fine swiper --}}




    </div>

    
    
    <div class="col-12 col-md-6 mb-3 text-center">
        <h2 class="display-5 my-3"> <span class="fw-bold"> </span>{{$article->title}}</h2>
        <div class="d-flex flex-column justify-content-center ">
            <h4 class="fw-bold my-3">{{$article->price}} €</h4>
            {{-- <h5>{{ __('ui.description') }}:</h5> --}}
            <p class="my-3">{{$article->description}}</p>
            {{-- pulsante favoriti --}}
            {{-- @auth
            <form action="{{ route('articles.favorite', $article->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn ">
                    @if (Auth::user()->favorites->contains($article->id))
                        <i class="fa-solid fa-heart fa-2x" style="color: #e60505;"><p class="text-black fs-6" > Articolo aggiunto alla lista dei desideri</p></i>
                    @else
                        <i class="fa-regular fa-heart fa-2x" style="color: #e60505;"><p class="text-black fs-6"> Aggiungi alla lista dei desideri</p> </i>
                    @endif
                </button>
            </form>
            @endauth --}}

            @auth
        <livewire:favorite-button :article="$article" />
        @endauth

        @if (session('message2'))
        <div class="alert alert-dark">
            <p class="m-0">{{ session('message2') }}</p>
        </div>
    @endif
        </div>
    </div>
</div>
</div>



{{-- swiper --}}

{{-- <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
    @if ($article->images->count() > 0)
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ $article->images->first()->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
      </div>
      @foreach ($article->images as $key => $image)
                        @if ($key != 0)
                            <div class="swiper-slide">
                                <img src="{{ $image->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
                            </div>
                        @endif
                    @endforeach
     
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    @endif
  </div>

  <div thumbsSlider="" class="swiper mySwiper">
    @if ($article->images->count() > 0)
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ $article->images->first()->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
      </div>
      @foreach ($article->images as $key => $image)
      @if ($key != 0)
          <div class="swiper-slide">
              <img src="{{ $image->getUrl(1400, 1400) }}" class="card-img-top" alt="..." height="300px">
          </div>
      @endif
  @endforeach
    </div>
@endif
  </div> --}}

{{-- fine swiper --}}








</x-layout>
