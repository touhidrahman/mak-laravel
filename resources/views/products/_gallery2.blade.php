<div class="lg:w-1/2 px-5"
    x-data="{ selectedImage: '{{ $product->images[0]->path ?? '' }}' }">

    <div class="w-full relative pb-5 sm:pb-0 mb-4">
        <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
            <img class="object-cover" alt="product image" :src="selectedImage"
                src="{{ $product->images[0]->path ?? '' }}">
        </div>
    </div>

    <div class="grid gap-4 grid-cols-4 sm:grid-cols-5 md:grid-cols-6">
        @foreach ($product->images as $image)
            <div class="w-full h-full overflow-hidden">
                <img class="cursor-pointer object-cover w-full h-full" @click="selectedImage = $event.target.src"
                    x-bind:class="selectedImage == '{{ $image->path }}' ? 'border-primary border-2 border-solid' : ''"
                    alt="product image" src="{{ $image->path }}">
            </div>
        @endforeach
    </div>

</div>
