<x-layout>
    {{-- <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 ">
                <h1 class="display-1 my-5 text-center  fw-bold">Registrati</h1>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid my-4">
        <div class="row justify-content-center subscribe2">
            <div class="col-8 border shadow rounded p-3 wrapper1">
                <form class="my-1 mx-4 " method="POST" action="{{route('register')}}">
                    @csrf
                    <h1 class="display-2  text-center  fw-bold">{{ __('ui.register') }}</h1>
                    <div class="mb-3 mt-5 input-field">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control form-custom mx-auto" name="name" value="{{ old('name') }}" placeholder="Mario Rossi">
                    </div>
                    <div class="mb-3 input-field">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control  form-custom mx-auto" name="email" value="{{ old('email') }}" placeholder="example@mail.it">
                    </div>
                    <div class="mb-3 input-field">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control  form-custom mx-auto" name="password" placeholder="********">
                    </div>
                    <div class="mb-3 input-field">
                        <label class="form-label">{{ __('ui.confirmPassword') }}</label>
                        <input type="password" class="form-control  form-custom mx-auto" name="password_confirmation" placeholder="********">
                    </div>
                        <button type="submit" class="btn b-custom my-2 w-25 mx-auto ">Submit</button>
                    <div class="register">
                        <p class="small pe-2">{{ __('ui.registerText') }} <a href="{{route('login')}}">{{ __('ui.login') }}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>