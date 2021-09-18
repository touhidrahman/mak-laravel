@props(['name', 'type' => 'text', 'placeholder' => '', 'message' => '', 'required' => false])

<x-form.field>
    <x-form.label name="{{ $name }}" required="{{ $required }}"></x-form.label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        placeholder="{{ $placeholder }}" {{ $attributes }}/>

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>
</x-form.field>
