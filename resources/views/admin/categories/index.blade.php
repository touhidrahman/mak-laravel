@extends('layouts.auth')

@section('content')

<x-admin.page-toolbar>

    <x-admin.button-primary class="">
        <a href="/admin/categories/create" class="block py-2 px-4">Add Category</a>
    </x-admin.button-primary>

</x-admin.page-toolbar>



@endsection
