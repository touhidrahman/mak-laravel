<div class="lg:w-1/2 px-5"
    x-data="{ selectedImage: '{{ $product->images[0]->path ?? '' }}', selectedColor: '' }">

    <div class="w-full relative pb-5 sm:pb-0 mb-4">
        <div class="bg-white border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
            <img class="object-contain"
                alt="product image"
                :src="selectedImage"
                @colorselected.window="selectedImage = document.querySelector('#color_id_' + $event.detail.id)?.src || '{{ $product->images[0]->path }}'"
                src="{{ $product->images[0]->path ?? '' }}">
        </div>
    </div>

    <div x-show="selectedColor == ''" class="grid gap-4 grid-cols-4 sm:grid-cols-5 md:grid-cols-6">
        @foreach ($product->images as $image)
            @if (!$image->color_id)
                <div class="w-full h-full overflow-hidden">
                    <img class="cursor-pointer object-cover w-full h-full"
                        @click="selectedImage = $event.target.src"
                        x-bind:class="selectedImage == '{{ $image->path }}' ? 'border-primary border-2 border-solid' : ''"
                        alt="product image"
                        src="{{ $image->path }}">
                </div>
            @endif
        @endforeach
    </div>

    <div @colorselected.window="selectedColor = $event.detail.id"
        x-show="selectedColor != ''"
        class="grid gap-4 grid-cols-4 sm:grid-cols-5 md:grid-cols-6">
        @foreach ($product->images as $image)
            <div class="w-full h-full overflow-hidden" x-show="selectedColor == '{{$image->color_id ?? ''}}'">
                <img class="cursor-pointer object-cover w-full h-full"
                    @click="selectedImage = $event.target.src"
                    x-bind:class="selectedImage == '{{ $image->path }}' ? 'border-primary border-2 border-solid' : ''"
                    id="color_id_{{$image->color_id}}"
                    alt="product image"
                    src="{{ $image->path }}">
            </div>
        @endforeach
    </div>

</div>
