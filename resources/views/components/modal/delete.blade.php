@props(['title' => '', 'actionRoute', ])

<x-modal.simple title="{{ $title }}">
    <form action="{{ $actionRoute }}" method="POST">
        @csrf
        @method('DELETE')

        @isset($slot)
            {{ $slot }}
        @endisset

        <div class="flex mt-8 justify-end">
            <button type="submit" class="btn btn-error">Delete</button>
        </div>
    </form>
</x-modal.simple>
