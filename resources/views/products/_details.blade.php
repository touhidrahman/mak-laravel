<form action="{{ route('cart.items.add') }}" method="POST" class="lg:w-1/2 pt-8 lg:pt-0 px-5 block">
    @csrf
    <div class="border-b border-grey-dark mb-8">
        <div class="flex items-center">
            <h2 class=" font-butler text-2xl md:text-3xl lg:text-4xl">{{ $product->name }}</h2>
            {{-- <p class="bg-primary rounded-full ml-8 px-5 py-2 leading-none font-hk font-bold text-white uppercase text-sm">
                20% off</p> --}}
        </div>
        <div class="flex items-center pt-3">
            <span class="font-hk text-primary text-2xl">€{{ $product->selling_price / 100 }}</span>
            {{-- <span class="font-hk text-grey-darker text-xl line-through pl-5">€35.0</span> --}}
        </div>
    </div>

    <p class="font-hk text-secondary pb-5">
        {{ $product->seo_text }}
    </p>

    <input type="hidden" name="product_id" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="unit_price" name="unit_price" value="{{ $product->selling_price }}">

    <div class="flex justify-between pb-4">
        <div class="w-1/3 sm:w-1/5">
            <p class="font-hk text-secondary">Color</p>
        </div>
        <div x-data="{ color_id: '' }" class="w-2/3 sm:w-5/6 flex flex-wrap items-center">
            @foreach ($available_colors as $color)
                <button
                    type="button"
                    @click="$dispatch('colorselected', { id: {{$color->id}} }); color_id = '{{$color->id}}'"
                    x-bind:class="color_id == '{{ $color->id }}' ? 'border-primary' : ''"
                    class="border border-gray-200 bg-white text-sm font-medium px-3 py-1 hover:bg-gray-200 hover:text-primary focus:z-10 focus:ring-2 focus:ring-primary focus:text-primary mr-3 mb-3">
                    <div class="flex justify-center items-center">
                        <i class="bx bxs-circle text-3xl mr-3" style="color: {{ $color->hex }}"></i>
                        <span class="block">{{ $color->name }}</span>
                    </div>
                </button>
            @endforeach
            <input x-model="color_id" type="hidden" name="color_id" name="color_id" value="">
        </div>
    </div>
    <x-form.error name="color_id"></x-form.error>

    <div class="flex items-center justify-between pb-4">
        <div class="w-1/3 sm:w-1/5">
            <p class="font-hk text-secondary">Size</p>
        </div>
        <div class="w-2/3 sm:w-5/6">
            <select id="size" name="size" class="w-2/3 form-select">
                @foreach ($available_sizes as $available_size)
                    <option value="{{ $available_size }}">{{ $available_size }}</option>
                @endforeach
            </select>
            <x-form.error name="size"></x-form.error>
        </div>
    </div>
    <div class="flex items-center justify-between pb-8">
        <div class="w-1/3 sm:w-1/5">
            <p class="font-hk text-secondary">Quantity</p>
        </div>
        <div class="w-2/3 sm:w-5/6 flex" x-data="{ productQuantity: 1 }">
            <label for="qty" class="block relative h-0 w-0 overflow-hidden">Quantity form</label>
            <input type="number" id="qty" name="qty"
                class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                x-model="productQuantity" min="1">
            <div class="flex flex-col">
                <span
                    class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                    @click="productQuantity++">
                    <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i>
                </span>
                <span
                    class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                    @click="productQuantity > 1 ? productQuantity-- : productQuantity = 1">
                    <i class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i>
                </span>
            </div>
            <x-form.error name="qty"></x-form.error>
        </div>
    </div>
    <div class="flex pb-8 group">
        <button
            type="submit"
            class="bg-primary hover:bg-primary-light font-hk font-semibold transition-colors text-sm text-white px-5 md:px-8 py-4 md:py-5 rounded uppercase focus:outline-none inline-block tracking-wide">
            Add to Cart
        </button>
    </div>

    @if ($product->material)
        <div class="flex pb-2">
            <p class="font-hk text-secondary">Material:</p>
            <p class="font-hkbold text-secondary pl-3">{{ $product->material }}</p>
        </div>
    @endif
    @if ($product->code)
        <div class="flex pb-2">
            <p class="font-hk text-secondary">SKU:</p>
            <p class="font-hkbold text-secondary pl-3">{{ $product->code }}</p>
        </div>
    @endif

    <div class="pb-16 sm:pb-20 md:pb-24 mt-12">
        <div class="tabs flex flex-col sm:flex-row" role="tablist">
            <span class="tab-item active bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold text-secondary cursor-pointer transition-colors active">
                Description
            </span>
        </div>
        <div class="tab-content relative">
            <div class="tab-pane active bg-grey-light py-10 transition-opacity active" role="tabpanel">
                <div class="px-10 mx-auto text-center sm:text-left">
                    <div class="font-hk text-secondary text-base">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

