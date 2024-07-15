<x-layout>
    @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 ">
                <h1 class="display-1  text-center create-custom-h1">Revisor Dashboard</h1>
            </div>
        </div>
    </div>
    @if ($article_to_annull)
        <div class="container-fluid ">
            <div class="row justify-content-center text-center pt-5 ">
                <div class="col-12 d-flex align-item-center justify-content-center">
                    <form action="{{ route('annull', ['article' => $article_to_annull]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-annul py-2 px-5 fw-bold text-center">{{ __('ui.annullAction') }}</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if ($article_to_check)
        <div class="container-fluid">
            <div class="row justify-content-center pt-5 ">
                @if ($article_to_check->images->count())
                    {{-- @dd($article_to_check->images) --}}
                    @foreach ($article_to_check->images as $image)
                        <div class="col-12 col-md-3 mb-5 text-center d-flex flex-wrap justify-content-center">
                            <img src="{{ $image->getUrl(1400, 1400) }}"
                                alt="img{{ $image }}dell'articolo {{ $article_to_check->title }}"
                                class="img-fluid rounded shadow ">
                        </div>
                        <div class="col-12 col-md-3 text-center mb-5 "> 
                            <div class="card-body mb-4">
                                
                                @if ($image->labels)
                                @foreach ($image->labels as $label)
                                <i class="fa-solid fa-tag" style="color: #FFD43B;"></i>{{$label}}, 
                                    
                                @endforeach
                                @else

                                <p class="fst-italic">No labels</p>
                                    
                                @endif
                            </div>
                            <div class="card-body me-5 ">
                                
                                <div class="row justify-content-center ">
                                    <div class="col-2 d-flex ">
                                        <div class="text-center mx-auto {{ $image->adult }}">
                                        </div>
                                        <div class="col-10">Adult</div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2 d-flex">
                                        <div class="text-center mx-auto {{ $image->violence }}">
                                        </div>
                                        <div class="col-10">Violence</div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2 d-flex">
                                        <div class="text-center mx-auto {{ $image->spoof }}">
                                        </div>
                                        <div class="col-10">spoof</div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2 d-flex">
                                        <div class="text-center mx-auto {{ $image->racy }}">
                                        </div>
                                        <div class="col-10">racy</div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2 d-flex">
                                        <div class="text-center mx-auto {{ $image->medical }}">
                                        </div>
                                        <div class="col-10">medical</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-2 ps-3">
                            
                        </div> --}}
                    @endforeach
                @else
                    {{-- <div class="row justify-content-center align-item-center text-center"> --}}
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-12 col-md-6 mb-4 text-center ">
                            <img src="https://picsum.photos/200" alt="" class="img-fluid rounded shadow">
                        </div>
                    @endfor

                @endif




                <div class="col-12 col-md-6 mt-5 mx-auto d-flex flex-column justify-content-between  align-item-center px-auto">
                    <div>
                        <h1 class="fw-bold">{{ __('ui.title') }}: {{ $article_to_check->title }}</h1>
                        <h3>{{ __('ui.author') }}: {{ $article_to_check->user->name }}</h3>
                        <h3>{{ __('ui.price') }}: {{ $article_to_check->price }}€</h3>
                        <h4 class="fst-italic text-muted">#
                            {{ $article_to_check->category->name }}
                        </h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-dark py-2 px-5 fw-bold">{{ __('ui.refuse') }} <i
                                    class="fa-solid fa-square-xmark ms-2" style="color: #ffffff;"></i></button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-dark py-2 px-5 fw-bold ">{{ __('ui.accept') }}<i
                                    class="fa-regular fa-square-check ms-2" style="color: #ffffff;"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="row justify-content-center align-item-center text-center">
                <div class="col-12">
                    <h1 class="display-2 create-custom-h1">{{ __('ui.articleToCheck') }}</h1>
                    <a href="{{ route('home') }}" class="btn btn-return mt-5">{{ __('ui.goHome') }}</a>
                </div>
            </div>
        </div>
    @endif






























</x-layout>
