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
