<x-layout>
{{-- <div class="container-fluid">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 ">
                <h1 class="display-1 my-5 text-center  fw-bold">Accedi</h1>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid my-4">
        <div class="row justify-content-center subscribe">
            <div class="col-8 border shadow rounded p-3 wrapper1">
            <form class="m-4" method="POST" action="{{route('login')}}">
            @csrf
            <h1 class="display-1  text-center  fw-bold">{{ __('ui.login') }}</h1>
                    <div class="mb-3 mt-5  input-field">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@mail.it">
                    </div>
                    <div class="mb-3  input-field">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>
                    <button type="submit" class="btn b-custom2 mb-2 mt-4 w-25 mx-auto">Submit</button>
                    <div class="register">
                        <p class="small pe-2">{{ __('ui.loginText') }} <a href="{{route('register')}}">{{ __('ui.register') }}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>