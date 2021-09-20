<div class="overflow-x-auto">
    <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->active == true)
                        <div class="h-12 w-12 bg-green-500"></div>
                        @else
                        <div class="h-12 w-12 bg-red-400"></div>
                        @endif
                    </td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="w-12 h-12 mask mask-squircle">
                                    <img src="{{ Storage::disk('s3')->url($product->thumb_1) ?? '' }}"">
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">
                                    {{ $product->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if ($product->category)
                        <span class="badge badge-outline mr-2">{{ $product->category->name }}</span>
                        @endif
                        @if ($product->subcategory)
                        <span class="badge badge-outline mr-2">{{ $product->subcategory->name }}</span>
                        @endif
                        @if ($product->subsubcategory)
                        <span class="badge badge-outline">{{ $product->subsubcategory->name }}</span>
                        @endif
                    </td>
                    <td>{{ $product->selling_price }}</td>
                    <th>
                        <a href="{{ route('admin.products.manage') }}" class="btn btn-ghost btn-xs">manage</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
