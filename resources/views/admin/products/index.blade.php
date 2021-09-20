@extends('layouts.auth')

@section('content')

    <h1 class="text-3xl font-bold mb-10">Products</h1>

    <x-admin.page-toolbar>

        <a href=" /admin/products/create" class="btn btn-primary">Add Product</a>

    </x-admin.page-toolbar>

    <section class="mt-10">
        {{-- @include('admin.products._products-table') --}}

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
                                @if ($product->active)
                                <div class="h-4 w-4 rounded-full bg-green-500"></div>
                                @else
                                <div class="h-4 w-4 rounded-full bg-red-400"></div>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="w-12 h-12 mask mask-squircle">
                                            <img src="{{ '' }}">
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
                                <a href="{{ route('admin.products.manage', $product->id) }}" class="btn btn-ghost btn-xs">manage</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>

    </section>

@endsection
