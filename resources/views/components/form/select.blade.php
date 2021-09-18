@props(['name', 'type' => 'text', 'label' => 'Select', 'message' => '', 'required' => false])

<x-form.field>

    <x-form.label name="{{ $label }}" required="{{ $required }}"></x-form.label>

    <select id="{{ $name }}"
        class="block mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
        name="{{ $name }}">
        {{ $slot }}
    </select>

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>

</x-form.field>
