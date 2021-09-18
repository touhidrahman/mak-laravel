<x-admin.page-toolbar>

    <a href="{{ route('admin.categories') }}" class="btn btn-primary">Categories</a>
    <a href="{{ route('admin.subcategories') }}" class="btn btn-primary">Subcategories</a>
    <a href="{{ route('admin.subcategories') }}" class="btn btn-primary">Sub-subcategories</a>
    <a href="{{ route('admin.categories.show') }}" class="btn btn-secondary btn-outline">Add Category</a>
    <a href="{{ route('admin.subcategories.show') }}" class="btn btn-secondary btn-outline">Add Subcategory</a>
    <a href="{{ route('admin.subcategories.show') }}" class="btn btn-secondary btn-outline">Add Sub-subcategory</a>

</x-admin.page-toolbar>
