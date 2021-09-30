@props(['name', 'label' => '', 'placeholder' => '', 'message' => ''])


<script src="https://unpkg.com/lite-editor@1.6.39/js/lite-editor.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/lite-editor@1.6.39/css/lite-editor.css">

<x-form.field>
    <x-form.label name="{{ $label ? $label : $name }}" required="{{ $required ?? '' }}"></x-form.label>

    <textarea name="{{ $name }}" id="{{ $name }}"
        class="flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
        name="comment" rows="5" cols="40" placeholder="{{ $placeholder }}"
        {{ $attributes }}>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" message="{{ $message }}"></x-form.error>
</x-form.field>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const editor = new LiteEditor('#{{ $name }}', {
            minHeight: 200,
            maxHeight: 500,
            escapeNotRegisteredTags: true,
        });
    });
</script>
