@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Edit Featured Image</h1>

    <section class="mt-10">

        <form action="{{ route('admin.featured-images.update', $featuredImage->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.field>
                <img id="image" src="{{$featuredImage->image_url}}" class="w-auto h-32 block">
                <x-form.label name="Image"></x-form.label>
                <input type="file" name="image" id="image" onChange="thumbnailPreview(this, 'image')" />
                <x-form.error name="image"></x-form.error>
            </x-form.field>
            <x-form.input name="title" :value="$featuredImage->title"></x-form.input>
            <x-form.select name="title_color" label="Text color">
                <option value="dark" {{ $featuredImage->title_color == "dark" ? 'selected' : '' }}>Dark</option>
                <option value="light" {{ $featuredImage->title_color == "light" ? 'selected' : '' }}>Light</option>
            </x-form.select>
            <x-form.input name="button_label" label="Button Label" :value="$featuredImage->button_label"></x-form.input>
            <x-form.input name="page_path" label="Page Link" :value="$featuredImage->page_path"></x-form.input>

            <x-form.submit>Save</x-form.submit>
        </form>

    </section>

<script type="text/javascript">
    // display instant thumbnail of to be uploaded image
    function thumbnailPreview(fileInputRef, slotName) {
        var imgSlot = $('#' + slotName);
        if (fileInputRef.files && fileInputRef.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgSlot.attr('src', e.target.result).width('auto').height(200);
            };
            reader.readAsDataURL(fileInputRef.files[0]);
        }
    }
</script>

@endsection


