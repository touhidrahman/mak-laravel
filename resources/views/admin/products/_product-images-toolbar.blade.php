<div class="mt-8 mb-10">
    <x-admin.page-toolbar>

        <a href="{{ route('admin.products.manage', $product->id) }}" class="btn btn-primary">Manage Product</a>
        <a href="{{ route('admin.products.showThumbnails', $product->id) }}" class="btn btn-primary">Thumbnails</a>

    </x-admin.page-toolbar>
</div>
