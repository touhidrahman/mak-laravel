<div class="lg:w-1/2 flex flex-col-reverse sm:flex-row-reverse lg:flex-row justify-between px-5"
    x-data="{ selectedImage: '{{ $product->images[0]->path ?? '' }}' }">
    <div class="sm:pl-5 md:pl-4 lg:pl-0 lg:pr-2 xl:pr-3 flex flex-row sm:flex-col">

        @foreach ($product->images as $image)
            <div class="w-28 sm:w-32 lg:w-24 xl:w-28 relative pb-5 mr-3 sm:pr-0">
                <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center w-full">
                    <img class="cursor-pointer object-cover" @click="selectedImage = $event.target.src"
                        x-bind:class="selectedImage == '{{ $image->path }}' ? 'border-primary border-2 border-solid' : ''"
                        alt="product image" src="{{ $image->path }}">
                </div>
            </div>
        @endforeach

    </div>
    <div class="w-full relative pb-5 sm:pb-0">
        <div
            class="bg-v-pink border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
            <img class="object-cover" alt="product image" :src="selectedImage"
                src="{{ $product->images[0]->path ?? '' }}">
        </div>
    </div>
</div>
