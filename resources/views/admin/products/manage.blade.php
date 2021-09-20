@extends('layouts.auth')

@section('content')
    <h2 class="font-semibold text-3xl text-gray-600">Manage {{ $product->name }}</h2>
    <p class="text-gray-500">Upload product pictures, add related products and so on</p>

    @include('admin.products._products-toolbar')

    <form class="grid grid-cols-3 gap-8" action="{{ route('admin.products.uploadImages', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="">
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
        </div>

        <div class="col-span-2">
            <x-form.field>
                <x-form.label name="Other Images" required=""></x-form.label>
                <input type="file" name="images[]" id="images" multiple />
                <x-form.error name="images"></x-form.error>
            </x-form.field>

            <div class="grid grid-cols-6 gap-4 my-12">
                @foreach ($images as $image)
                <img src="{{ $image->path }}" class="block">
                @endforeach
            </div>

            <x-form.submit-cancel cancelRoute="{{ route('admin.products') }}"></x-form.submit-cancel>
        </div>
    </form>

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
