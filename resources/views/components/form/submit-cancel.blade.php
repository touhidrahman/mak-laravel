@props(['cancelRoute' => ''])

<div class="space-x-4">
    <x-form.submit>Save</x-form.submit>
    <x-form.cancel :route="$cancelRoute">Cancel</x-form.cancel>
</div>
