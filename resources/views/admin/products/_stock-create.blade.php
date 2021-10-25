<h2 class=" text-2xl font-semibold mb-6">Create Stock</h2>
<form action="{{ route('admin.stocks.store', $product->id) }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <x-form.select name="size" label="Size">
        <option selected disabled value="">Please select</option>
        @foreach ($sizes as $size)
            <option value="{{ $size }}" {{ old('size') ? 'selected' : '' }}>{{ $size }}
            </option>
        @endforeach
    </x-form.select>
    <x-form.select name="color_id" label="Color">
        <option selected disabled value="">Please select</option>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}" {{ old('color_id') ? 'selected' : '' }}>
                {{ $color->name }}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input type="number" name="qty" label="Quantity"></x-form.input>
    <x-form.input type="text" name="sku" label="SKU"></x-form.input>

    <div class="space-x-4">
        <button type="submit" class="btn btn-secondary">Save</button>
        <button type="reset" class="btn btn-ghost btn-secondary">Reset</button>
    </div>
</form>
