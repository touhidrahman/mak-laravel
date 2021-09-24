@extends('layouts.auth')

@section('content')

    <h1 class="text-3xl font-bold">Homepage Featured Images</h1>

    <div class="my-10">
        <a href="{{ route('admin.featured-images.show') }}" class="btn btn-primary">Add Featured Image</a>
    </div>

    <section class="mt-10">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Text Color</th>
                    <th>Page Path</th>
                    <th>Button Label</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($featuredImages as $featuredImage)
                    <tr>
                        <td></td>
                        <td>{{ $featuredImage->id }}</td>
                        <td>
                            <div class="avatar">
                                <div class="mb-8 rounded-btn w-24 h-24">
                                    <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url($featuredImage->image_url) }}">
                                </div>
                            </div>
                        </td>
                        <td>{{ $featuredImage->title }}</td>
                        <td>{{ $featuredImage->title_color }}</td>
                        <td>{{ $featuredImage->page_path }}</td>
                        <td>{{ $featuredImage->button_label }}</td>
                        <td>
                            <button @click="showModal = true"
                                class="ml-2 bg-transparent text-indigo-600 hover:text-indigo-900">
                                Delete
                            </button>
                            <x-modal.delete title="Delete {{ $featuredImage->title }}?"
                                actionRoute="{{ route('admin.featured-images.destroy', $featuredImage->id) }}">
                            </x-modal.delete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection
