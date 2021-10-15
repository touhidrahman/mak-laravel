@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold">Shipping Charge</h1>
    <section class="mt-10 max-w-screen-sm">
        @if ($charge)
        <form action="{{ route('admin.charges.update', $charge->id) }}" method="post">
            @csrf
            @method('PUT')

            <x-form.input name="name" label="Stripe Shipping ID" value="{{$charge->name}}"></x-form.input>
            <x-form.input name="amount" label="Amount (Eurocent)" type="number" value="{{$charge->amount}}"></x-form.input>
            <x-form.input name="min_order_amount" label="Free When Minimum Order Amount Is (Eurocent)" type="number" value="{{$charge->min_order_amount}}"></x-form.input>

            <x-form.submit>Save</x-form.submit>
        </form>
        @else
        <form action="{{ route('admin.charges.store') }}" method="post">
            @csrf

            <x-form.input name="name" label="Stripe Shipping ID" value="{{'Shipping'}}"></x-form.input>
            <x-form.input name="amount" label="Amount (Eurocent)" type="number"></x-form.input>
            <x-form.input name="min_order_amount" label="Free When Minimum Order Amount Is (Eurocent)" type="number"></x-form.input>

            <x-form.submit>Save</x-form.submit>
        </form>
        @endif

    </section>

@endsection
