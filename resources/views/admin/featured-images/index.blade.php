@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Homepage Featured Images</h1>

    <div class="my-10">
        <a href="{{ route('admin.featured-images.show') }}" class="btn btn-primary">Add Featured Image</a>
    </div>

    <section class="mt-10 grid grid-col-2 gap-10">

        @foreach ($featuredImages as $featuredImage)
            <div class="bg-white p-6 shadow-md border border-gray-200 rounded-lg">
                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $featuredImage->title }}</h5>
                <div class="font-normal text-gray-700 mb-3">
                    <div class="mb-8 w-auto h-24 overflow-hidden">
                        <img class="h-24 w-auto" src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url($featuredImage->image_url) }}">
                    </div>
                    <div>Title color: <strong>{{ $featuredImage->title_color }}</strong></div>
                    <div>Page link: <strong>{{ $featuredImage->page_path }}</strong></div>
                    <div>Button label: <strong>{{ $featuredImage->button_label }}</strong></div>
                </div>
                <a href="{{ route('admin.featured-images.edit', $featuredImage->id) }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                    Edit
                    <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        @endforeach

    </section>

@endsection
