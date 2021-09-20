{{-- TODO --}}
<x-form.select name="size" label="Size">
    <option value="" selected disabled>Select size</option>
    <option value="XS">XS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
</x-form.select>
<x-form.select name="color_id" label="Color">
    <option value="" selected disabled>Select color</option>
    @foreach ($colors as $color)
        <option value="{{ $color->id }}">{{ $color->name }}</option>
    @endforeach
</x-form.select>
