@props(['categories' => []])

<x-form.select label="Category" name="category_id">
    <option value="" selected disabled>(Select Category)</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-form.select>

<x-form.select label="Subcategory" name="subcategory_id">
    <option value="" selected disabled>(Select Subcategory)</option>
</x-form.select>

<x-form.select label="Sub-subcategory" name="subsubcategory_id">
    <option value="" selected disabled>(Select Sub-subcategory)</option>
</x-form.select>
