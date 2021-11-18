<x-admin.link url="{{route('admin.products.manage', $product->id)}}">Manage Stocks</x-admin.link>
<x-admin.link url="{{route('admin.products.edit', $product->id)}}">Edit</x-admin.link>
<x-admin.link url="{{route('admin.products.editCategories', $product->id)}}">Edit Categories</x-admin.link>
<x-admin.link url="{{route('admin.products.showThumbnails', $product->id)}}">Thumbnails</x-admin.link>
<x-admin.link url="{{route('admin.products.images', $product->id)}}">Images</x-admin.link>
