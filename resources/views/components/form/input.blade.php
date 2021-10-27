@props([
    'label' => '',
    'name', 'type' => 'text', 'placeholder' => '', 'message' => '', 'required' => false, 'disabled' => false
    ])

<x-form.field>
    <x-form.label name="{{ $label ? $label : $name }}" required="{{ $required }}"></x-form.label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="{{ $disabled ? 'text-gray-500 bg-gray-50' : 'text-gray-700 bg-white' }} mt-1 border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes(['value' => old($name)]) }} />

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>
</x-form.field>
