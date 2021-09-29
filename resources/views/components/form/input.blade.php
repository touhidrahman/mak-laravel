@props([
    'label' => '',
    'name', 'type' => 'text', 'placeholder' => '', 'message' => '', 'required' => false
    ])

<x-form.field>
    <x-form.label name="{{ $label ? $label : $name }}" required="{{ $required }}"></x-form.label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="mt-1 border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        placeholder="{{ $placeholder }}" {{ $attributes(['value' => old($name)]) }} />

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>
</x-form.field>
