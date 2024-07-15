<div class="row justify-content-center">
    @if (session('message'))
        <div class="alert alert-success">
            <p class="m-0">{{ session('message') }}</p>
        </div>
    @endif

    <div class="col-6 rounded shadow  p-3 form-custom">

        <form wire:submit.prevent="store" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label label-custom">{{ __('ui.title') }} </label>
                <input type="text" class="form-control" wire:model.blur="title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label label-custom">{{ __('ui.price') }} </label>
                <input type="number" class="form-control" wire:model.blur="price">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label label-custom">{{ __('ui.description') }}</label>
                <textarea wire:model.blur="description" cols="30" rows="5" class="form-control"
                    @error('description') is-invalid
                @enderror>{{ old('description') }}>   </textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label label-custom">{{ __('ui.categorySelect') }}</label>
                <select class="form-control" wire:model="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ __('ui.' . $category->name) }}</option>
                    @endforeach
                </select>
                {{-- @error('categorySelect')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
            </div>

            <div class="mb-3">
                <input type="file" class="form-control shadow @error('temporary_images') is-invalid @enderror label-custom"
                    wire:model.live="temporary_images" multiple placeholder="Img">
                @error('temporary_images.*')
                    <p class="alert alert-danger fst-italic">{{ $message }}</p>
                @enderror

                @error('temporary_images')
                    <p class="alert alert-danger fst-italic">{{ $message }}"></p>
                @enderror
            </div>

            @if (!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Photo Preview</p>
                        <div class="row border border-4 border-dark rounded shadow py-4 mb-3">
                            @foreach ($images as $key => $image)
                                <div class="col d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded align-items-start d-flex justify-content-end"
                                        style="background-image: url('{{ $image->temporaryUrl() }}')">
                                        <button type="button" class="btn btn-danger "    wire:click="removeImage({{ $key }})"><i class="fa-solid fa-xmark" style="color: #ffffff;"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn-custom-form mx-auto">{{ __('ui.create') }}</button>


        </form>
    </div>
</div>
</div>

</div>
