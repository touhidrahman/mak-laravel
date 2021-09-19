@extends('layouts.auth')

@section('content')

    <h2 class="font-semibold text-xl text-gray-600">Edit Sub-subcategory: {{ $subsubcategory->name }}</h2>
    <p class="text-gray-500 mb-6"></p>

    <form class="lg:col-span-2" action="{{ route('admin.subsubcategories.update', $subsubcategory->id) }}" method="POST">
        @csrf

        <x-form.select label="Category" name="category_id">
            <option value="" selected disabled>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->id == $subsubcategory->category?->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </x-form.select>

        <x-form.select name="subcategory_id" label="Subcategory">
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}"
                    {{ $subcategory->id == $subsubcategory->subcategory?->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </x-form.select>

        <x-form.input name="name" :required="true" value="{{ $subsubcategory->name }}" placeholder="Sub-subcategory Name">
        </x-form.input>

        <div class="space-x-4">
            <x-form.submit>Update</x-form.submit>
            <x-form.cancel route="{{ route('admin.subsubcategories') }}">Cancel</x-form.cancel>
        </div>
    </form>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/admin/categories/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value.name + '</option>'
                            );
                        });
                    },
                });
            }
        });
    });
</script>
