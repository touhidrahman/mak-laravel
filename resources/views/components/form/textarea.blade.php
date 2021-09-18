@props(['name', 'type' => 'text', 'placeholder' => '', 'message' => ''])

<x-form.field>
    <x-form.label name="{{ $name }}" required="{{ $required }}"></x-form.label>

    <textarea type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes(['value' => old($name)]) }}>
    {{ $slot ?? old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>
</x-form.field>
