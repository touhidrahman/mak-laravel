@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Add Featured Image</h1>

    <section class="mt-10">

        <form action="{{ route('admin.featured-images.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.field>
                <img id="image" src="" class="w-auto h-32 block">
                <x-form.label name="Image" required="true"></x-form.label>
                <input type="file" name="image" id="image" onChange="thumbnailPreview(this, 'image')" />
                <x-form.error name="image"></x-form.error>
            </x-form.field>
            <x-form.input name="title"></x-form.input>
            <x-form.select name="title_color" label="Text color">
                <option value="dark">Dark</option>
                <option value="light">Light</option>
            </x-form.select>
            <x-form.input name="button_label" label="Button Label"></x-form.input>
            <x-form.input name="page_path" label="Page Link"></x-form.input>

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


