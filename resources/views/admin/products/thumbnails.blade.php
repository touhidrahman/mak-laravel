@extends('layouts.admin')

@section('content')
    <h2 class="font-semibold text-3xl text-gray-600">Thumbnail Photos for {{ $product->name }}</h2>

    <div class="grid grid-cols-3 gap-8" >
        <form class="block"
            action="{{ route('admin.products.uploadThumbnails', $product) }}"
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

            <x-form.submit-cancel cancelRoute="{{ route('admin.products.manage', $product->id) }}"></x-form.submit-cancel>
        </form>
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
