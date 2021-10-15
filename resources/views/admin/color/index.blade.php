@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Colors</h1>
    <section class="mt-10 grid gap-8 grid-cols-4">
        <div class="col-span-3">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Hex</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($colors as $color)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>
                                {{ $color->name }}
                            </td>
                            <td>
                                <i class="bx bxs-circle mr-2 text-2xl" style="color: {{$color->hex}}"></i>
                                {{ $color->hex }}
                            </td>
                            <td>
                                <form action="{{ route('admin.colors.destroy', $color->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="ml-2 bg-transparent text-indigo-600 hover:text-indigo-900">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="">
            <h1 class=" text-lg font-semibold mb-6">Add Color</h1>
            <form action=" {{ route('admin.colors.store') }}" method="post">
                @csrf

                <x-form.input name="name"></x-form.input>
                <x-form.input name="hex" label="HEX Value"></x-form.input>

                <x-form.submit>Save</x-form.submit>
            </form>
        </div>
    </section>

@endsection
