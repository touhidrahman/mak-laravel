@props(['name', 'required' => false])

<label for="{{ $name }}" class="text-gray-700 ">
    {{ ucwords($name) }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>
