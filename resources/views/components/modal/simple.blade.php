@props(['title' => ''])

<!--Overlay-->
<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal"
    :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">

    <!--Dialog-->
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal"
        @click.away="showModal = false" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">{{ $title }}</p>

            <div class="cursor-pointer z-50" @click="showModal = false">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>

        <!-- content -->
        <section>
            {{ $slot }}
        </section>

        <!--Footer-->
        <div class="flex justify-end pt-2">
            {{ $footer }}

            {{-- <button class="modal-close ml-2 px-4 bg-indigo-700 py-2 rounded-lg text-white hover:bg-indigo-600"
                @click="showModal = false">Close</button> --}}
        </div>


    </div>
    <!--/Dialog -->
</div><!-- /Overlay -->
