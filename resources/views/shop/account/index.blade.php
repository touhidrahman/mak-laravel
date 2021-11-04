@extends('shop.account._account-layout')

@section('account-content')

    <h1 class="text-xl">Welcome, {{ auth()->user()->name }}!</h1>

@endsection
