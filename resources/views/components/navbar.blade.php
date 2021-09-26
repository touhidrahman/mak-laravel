@php
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Support\Facades\Cache;

$categories = Cache::remember('categories', 3600 * 24, function () {
    return Category::all();
});
$subcategories = Cache::remember('subcategories', 3600 * 24, function () {
    return Subcategory::all();
});
$subsubcategories = Cache::remember('subsubcategories', 3600 * 24, function () {
    return Subsubcategory::all();
});
@endphp

@props([
    'categories' => $categories,
    'subcategories' => $subcategories,
    'subsubcategories' => $subsubcategories,
])

<div class="container relative">
    <div class="shadow-xs py-6 lg:py-10 z-50 relative">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="block lg:hidden">
                    <i class="bx bx-menu text-primary text-4xl" @click="mobileMenu = !mobileMenu"></i>
                </div>

                <button @click="mobileSearch = !mobileSearch"
                    class="cursor-pointer border-2 transition-colors border-transparent hover:border-primary rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:mr-8 group focus:outline-none">
                    <img src="{{ asset('img/icons/icon-search.svg') }}"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden" alt="icon search" />
                    <img src="{{ asset('img/icons/icon-search-hover.svg') }}"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block" alt="icon search hover" />
                </button>

                <a href="/account/wishlist"
                    class="border-2 transition-all border-transparent hover:border-primary rounded-full p-2 sm:p-4 group hidden lg:block">
                    <img src="{{ asset('img/icons/icon-heart.svg') }}"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden" alt="icon heart" />
                    <img src="/img/icons/icon-heart-hover.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block" alt="icon heart hover" />
                </a>
            </div>
            <a class="md:text-5xl text-2xl font-bold cursor-pointer" href="/">
                M&A <span class="text-primary">Kleid</span>
            </a>

            <div class="flex items-center">
                <a href="/account/dashboard"
                    class="border-2 transition-all border-transparent hover:border-primary rounded-full p-2 sm:p-4 group">
                    <img src="/img/icons/icon-user.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden" alt="icon user" />
                    <img src="/img/icons/icon-user-hover.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block" alt="icon user hover" />
                </a>

                <a href="/cart/index"
                    class="hidden lg:block border-2 transition-all border-transparent hover:border-primary rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                    <img src="/img/icons/icon-cart.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden" alt="icon cart" />
                    <img src="/img/icons/icon-cart-hover.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block" alt="icon cart hover" />
                </a>

                <span @click="mobileCart = !mobileCart"
                    class="block lg:hidden border-2 transition-all border-transparent hover:border-primary rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                    <img src="/img/icons/icon-cart.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden" alt="icon cart" />
                    <img src="/img/icons/icon-cart-hover.svg"
                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block" alt="icon cart hover" />
                </span>
            </div>

            <div class="hidden">
                <i class="bx bx-menu text-primary text-3xl" @click="mobileMenu = true"></i>
            </div>
        </div>

        <div class="justify-center lg:pt-8 hidden lg:flex">
            <ul class="list-reset flex items-center">

                @foreach ($categories as $category)
                    <li class="mr-10 hidden lg:block group">
                        <div class="border-b-2 border-white transition-colors group-hover:border-primary flex items-center">
                            <span
                                class="cursor-pointer text-lg font-hk group-hover:font-bold text-secondary group-hover:text-primary px-2 transition-all">
                                {{ $category->name }}
                            </span>
                            <i class="bx bx-chevron-down text-secondary group-hover:text-primary pl-2 px-2 transition-colors"></i>
                        </div>
                        <div
                            class="pt-10 absolute mt-40 top-0 left-0 right-0 z-50 w-2/3 mx-auto opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto ">
                            <div class="transition-all flex bg-white shadow-lg p-8 rounded-b relative ">

                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category_id == $category->id)
                                        <div class="flex-1 relative z-20">
                                            <h4 class="font-hkbold text-base text-secondary mb-2">
                                                {{ $subcategory->name }}</h4>

                                            <ul>
                                                @foreach ($subsubcategories as $subsubcategory)
                                                    @if ($subsubcategory->subcategory_id == $subcategory->id)
                                                        <li>
                                                            <a href="/shop"
                                                                class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">
                                                                {{ $subsubcategory->name }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </li>
                @endforeach

                <li class="mr-10">
                    <a href="/service"
                        class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-primary border-b-2 border-white hover:border-primary px-2">Service</a>
                </li>

                <li class="mr-10">
                    <a href="/b2b"
                        class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-primary border-b-2 border-white hover:border-primary px-2">B2B</a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- mobile menu --}}
<div class="fixed inset-x-0 pt-20 md:top-28 z-50 opacity-0 pointer-events-none transition-all "
    :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
    <div class="w-full sm:w-1/2 absolute left-0 top-0 px-6 z-40 bg-white shadow-sm">
        <a href="/"
            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block ">
            Home
        </a>

        <div class="w-full py-3 border-b border-grey-dark block" x-data="{ isParentAccordionOpen: false }">
            <div class="flex items-center justify-between" @click="isParentAccordionOpen = !isParentAccordionOpen">
                <span class="font-hk font-medium block transition-colors"
                    :class="isParentAccordionOpen ? 'text-primary' : 'text-secondary'">Collections</span>
                <i class="bx text-secondary text-xl"
                    :class="isParentAccordionOpen ? 'bx-chevron-down' : 'bx-chevron-left'"></i>
            </div>

            <div class="transition-all" :class="isParentAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                @foreach ($categories as $category)
                    <div x-data="{ isAccordionOpen: false }">
                        <div class="flex items-center pt-3" @click="isAccordionOpen = !isAccordionOpen">
                            <i class="bx text-xl pr-3 transition-colors"
                                :class="isAccordionOpen ? 'bx-chevron-down text-secondary' : 'bx-chevron-right text-grey-darkest'"></i>
                            <a href="/collection-grid.html" class="font-hk font-medium transition-colors"
                                :class="isAccordionOpen ? 'text-primary' : 'text-grey-darkest'">{{ $category->name }}</a>
                        </div>
                        <div class="pl-12 transition-all"
                            :class="isAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                            @foreach ($subcategories as $subcategory)
                                @if ($subcategory->category_id == $category->id)
                                    <a href="/shop"
                                        class="font-hk font-medium text-secondary block mt-2">{{ $subcategory->name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <a href="/services"
            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Services
        </a>
        <a href="/b2b"
            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">B2B
        </a>

        <div class="my-8">
            <a href="/login" class="btn btn-primary w-full mb-4" aria-label="Login button">Login Account</a>
            <a href="/register" class="font-hk text-secondary md:text-lg pl-3 underline text-center block">Create your
                account</a>
        </div>
    </div>
</div>


<div class="absolute inset-x-0 opacity-0 pointer-events-none z-50 top-20 lg:top-28"
    :class="{ 'opacity-100 pointer-events-auto': mobileSearch }">
    <div class="container">
        <div class="w-full sm:w-1/2 lg:w-1/4 z-10 bg-white shadow-sm rounded">
            <form action="/search" class="border border-grey-dark px-4 py-3 rounded-md flex items-center">
                <input type="text" name="search"
                    class="font-hk font-medium text-secondary outline-none border-grey-dark w-full placeholder-grey-darkest focus:ring focus:ring-primary focus:outline-none focus:border-primary"
                    placeholder="Search for a product" />
                <button class="flex items-center focus:outline-none focus:border-transparent">
                    <i class="bx bx-search text-primary text-xl ml-4"></i>
                </button>
            </form>
        </div>
    </div>
</div>
