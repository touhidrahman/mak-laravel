<div class="mt-8 mb-10">
    <x-admin.page-toolbar>

        <a href="{{ route('admin.products') }}" class="btn btn-primary">Active Products</a>
        <a href="{{ route('admin.products') . '?active=false' }}" class="btn btn-primary">Disabled Products</a>
        <a href="{{ route('admin.products.show') }}" class="btn btn-primary">Add Product</a>

    </x-admin.page-toolbar>
</div>
