@props(['name', 'type' => 'text', 'placeholder' => '', 'message' => '', 'required' => false])

<x-form.field>

    <label class="text-gray-700" for="animals">
        {{ ucwords($name) }}

        <select id="{{ $name }}"
            class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
            name="{{ $name }}">
            {{ $slot }}
        </select>
    </label>

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>

</x-form.field>
