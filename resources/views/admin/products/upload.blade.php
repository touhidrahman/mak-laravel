@extends('layouts.admin')

@section('content')
    <h2 class="font-semibold text-3xl text-gray-600">Upload Photos for {{ $product->name }}</h2>

    @include('admin.products._products-toolbar')

    <div class="grid grid-cols-3 gap-8" >
        <form class="block"
            action="{{ route('admin.products.uploadImages', $product->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">

            <x-form.field>
                <img id="thumb_1_slot" src="{{ $product->thumb_1 }}" class="w-32 h-32 block">
                <x-form.label name="Cover Image 1" required="true"></x-form.label>
                <input type="file" name="thumb_1" id="thumb_1" onChange="thumbnailPreview(this, 'thumb_1_slot')" />
                <x-form.error name="thumb_1"></x-form.error>
            </x-form.field>

            <x-form.field>
                <img id="thumb_2_slot" src="{{ $product->thumb_2 }}" class="w-32 h-32 block">
                <x-form.label name="Cover Image 2" required="true"></x-form.label>
                <input type="file" name="thumb_2" id="thumb_2" onChange="thumbnailPreview(this, 'thumb_2_slot')" />
                <x-form.error name="thumb_2"></x-form.error>
            </x-form.field>

            <x-form.field>
                <x-form.label name="Other Images" required=""></x-form.label>
                <input type="file" name="images[]" id="images" multiple />
                <x-form.error name="images"></x-form.error>
            </x-form.field>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </form>

        <div class="col-span-2">
            <div class="grid grid-cols-6 gap-4 mb-12">
                @foreach ($images as $image)
                <div class="h-48 w-auto overflow-hidden relative">
                    <img src="{{ $image->path }}" class="block w-full h-full object-cover">
                    <form action="{{ route('admin.products.deleteImage',['productId' => $product->id, 'imageId' => $image->id]) }}"
                        method="POST"
                        class="absolute inset-0 inline-flex justify-center items-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="rounded py-1 px-2 hover:text-red-800 font-semibold hover:bg-red-400 text-red-500">
                            <i class="bx bx-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>

                {{-- <x-modal.delete title="Delete Image {{ $image->id }}?"
                    actionRoute="{{ route('admin.products.deleteImage',['productId' => $product->id, 'imageId' => $image->id]) }}">
                </x-modal.delete> --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    // display instant thumbnail of to be uploaded image
    function thumbnailPreview(fileInputRef, slotName) {
        var imgSlot = $('#' + slotName);
        if (fileInputRef.files && fileInputRef.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgSlot.attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(fileInputRef.files[0]);
        }
    }
</script>
