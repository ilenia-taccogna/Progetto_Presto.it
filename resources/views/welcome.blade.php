<x-layout>



    {{-- inizio hedaer --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 background d-flex flex-column">
                <h2 class="titolo display-1 m-5 zoom fw-bold">Presto.it</h2>
                <p class="slogan display-3 m-5 zoom ">{{__('ui.headerSubtext')}}</p>
            </div>
        </div>
    </div>
    
    {{-- fine header --}}
    
    {{-- sezione bottone --}}

    <div class="container-fluid">
            <div class="row justify-content-center align-items-center header mb-5">
                
                <div class="col-12 col-md-6">

                </div>
                <div class="col-12 col-md-6 d-flex  header-wrapper">
                

                    
                        <div class="card-body card-custom p-3 me-5">
                          <h5 class="card-title my-4 h5-custom">"{{__('ui.publicArticle')}}"</h5>
                          <a class="btn btn-dark" href="{{route('article.create')}}"><i class="fa-solid fa-plus"></i>     {{__('ui.publicArticleButton')}}</a>
                        </div>
                      

                </div>
            </div>
        </div>

        

    {{-- fine sezione bottone --}}
    @if (session()->has('errorMessage'))
    <div class="row justify-content-center">
        <div class="col-5 alert alert-danger text-center shadow rounded">
            {{session('errorMessage')}}
        </div>
    </div>
    @endif
    @if (session()->has('message'))
    <div class="row justify-content-center">
        <div class="w-50 alert alert-info text-center shadow rounded">
            {{session('message')}}
        </div>
    </div>
    @endif
    <div class="container-fluid ">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
            
                <x-card :article="$article" />
                
            
            @empty
            <div class="col-12">
                <h3 class="text-center">{{__('ui.noArticle')}}</h3>
                
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
