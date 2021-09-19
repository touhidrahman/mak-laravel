@extends('layouts.auth')

@section('content')

    <x-admin.page-toolbar>

        <a href="{{ route('admin.colors') }}" class="btn btn-primary">Colors</a>
        <a href="{{ route('admin.colors') }}" class="btn btn-secondary btn-outline">Add Color</a>

    </x-admin.page-toolbar>

    <section class="mt-10 grid gap-8 grid-cols-4">
        <div class="col-span-3">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Hex</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <th>{{ $color->id }}</th>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->hex }}</td>
                            <td>
                                <button @click="showModal = true"
                                    class="ml-2 bg-transparent text-indigo-600 hover:text-indigo-900">
                                    Delete
                                </button>
                                <x-modal.delete title="Delete {{ $color->name }}?"
                                    actionRoute="{{ route('admin.colors.destroy', $color->id) }}">
                                </x-modal.delete>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="">
            <h1 class="text-lg font-semibold mb-6">Add Color</h1>
            <form action=" {{ route('admin.colors.store') }}" method="post">
            @csrf

            <x-form.input name="name"></x-form.input>
            <x-form.input name="hex" label="HEX Value"></x-form.input>

            <x-form.submit>Save</x-form.submit>
            </form>
        </div>
    </section>

@endsection
