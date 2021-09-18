@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bg-green-100 border-2 border-green-400 text-green-400 border-solid">
        <p>{{ session('success') }}</p>
    </div>
@endif
