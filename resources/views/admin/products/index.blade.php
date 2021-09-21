@extends('layouts.auth')

@section('content')

    <h1 class="text-3xl font-bold">Products</h1>

    @include('admin.products._products-toolbar')

    <section class="mt-10">

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
                                            {{-- <img src="{{ route('admin.products.thumb_1', $product->thumb_1) }}" class="block"> --}}
                                            <img src="{{ $product->thumb_1 }}" class="block">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">
                                            <a href="{{ route('admin.products.manage', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
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
                                <a href="{{ route('admin.products.manage', $product->id) }}"
                                    class="btn btn-ghost btn-xs">manage</a>
                                <a href="{{ route('admin.products.showUploadForm', $product->id) }}"
                                    class="btn btn-ghost btn-xs">Images</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>

    </section>

@endsection
