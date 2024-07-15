<nav class="navbar navbar-expand-lg border-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/img/logo2.png" class="img-fluid img-custom ms-5"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto  mb-2 mb-lg-0">
                <li class="nav-item mx-xl-3 mx-lg-0">
                    <a class="nav-link active " aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                {{-- <form class="d-flex" role="search">
                    <input class="form-control me-2 search-custom" type="search" placeholder="Cosa stai cercando?..." aria-label="Search">
                    <button class="btn btn-custom" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form> --}}
                <form class="d-flex mx-md-auto my-md-2 searchbar my-lg-0" role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control search-custom " id="search"
                            placeholder="{{__('ui.searchBar')}}" aria-label="Search">
                        <button type="submit" class="btn search-glass input-group-text" id="basic-addon2"><i
                                class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
                @auth
                    <li class="nav-item ms-5">
                        @if (Auth::user()->is_revisor)
                            <!-- qui ci mettiamo il collegamento x il revisore -->
                    <li class="nav-item">
                        <a class="nav-link btn b-custom btn-sm position-relative "
                            href="{{ route('revisor.index') }}">{{__('ui.revisorArea')}}</a>
                        <span
                            class="position-absolute top-25 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                    </li>
                    @endif
                    <li class="nav-item dropdown my-md-2 my-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user"></i>{{__('ui.hello')}} , {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">{{__('ui.createArticle')}}</a></li>
                            <li><a class="dropdown-item" href=" {{ route('article.index') }}">{{__('ui.allArticles')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                            <li class="text-center">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="mx-4 my-2 btn btn-sm w-sm-25  b-custom">Logout</button>
                                </form>
                            </li>

                        </ul>

                        {{-- icona preferiti --}}
                    <li class="nav-item my-md-0 my-lg-2 ms-lg-3">
                        <a href="{{ route('favorites.index')}}"><i class="fa-solid fa-heart fa-xl position-relative" style="color: #000000;"></i></a>
                        <livewire:favorite-counter />
                        

                    </li>
                    @else
                    <li class="nav-item mx-2 ms-5">
                        <a class="nav-link btn b-custom mx-2" href="{{ route('register') }}">{{__('ui.register')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn b-custom2" href="{{ route('login') }}">{{__('ui.login')}}</a>
                    </li>
                    

                @endauth
                <li class="nav-item dropdown ms-xl-5 ms-lg-0 ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><x-locale lang="it" /> Italiano</li>
                        <li>   <x-locale lang="en" /> English</li>
                        <li>   <x-locale lang="es" /> Espanol</li>
                        
                
                
                
            </ul>
        </div>
        {{-- <x-locale lang="it"/>
    <x-locale lang="en"/>
    <x-locale lang="es"/> --}}
    </div>
</nav>
