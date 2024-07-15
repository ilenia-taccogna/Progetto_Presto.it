<x-layout>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <h1 class=" display-2 mt-4 mb-2 text-center create-custom-h1">{{ __('ui.createArticle') }}</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid background-form">
                <livewire:create-article />
        </div>

    </x-layout>