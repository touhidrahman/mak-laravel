<form class="flex" action=" {{ route('admin.products.manage', $product->id) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <x-form.select name="active" label="">
        <option value="" disabled>Please select</option>
        <option value="true" {{ $product->active ? 'selected' : '' }}>Active</option>
        <option value="false" {{ !$product->active ? 'selected' : '' }}>Disabled</option>
    </x-form.select>
    <button type="submit" class="btn btn-secondary ml-4">Save</button>
</form>
