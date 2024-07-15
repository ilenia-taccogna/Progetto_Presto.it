<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- cdn swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    {{-- cdn google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    @vite (['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>Document</title>
</head>

<body>
    <x-nav />
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="d-flex mx-auto">
                {{-- <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
            </button> --}}

                <div class="dropdown d-block d-lg-none">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorie
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-items text-decoration-none ms-2"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </div>

                <ul class="d-flex d-lg-block d-none my-auto">
                    @foreach ($categories as $category)
                        <a class="mx-2 a-custom"
                            href="{{ route('byCategory', ['category' => $category]) }}">{{ __('ui.' . $category->name) }}
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div class="min-vh-100">
        {{ $slot }}
    </div>
    <x-foot />




    <script src="https://kit.fontawesome.com/c0427b54eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @livewireScripts
</body>

</html>
