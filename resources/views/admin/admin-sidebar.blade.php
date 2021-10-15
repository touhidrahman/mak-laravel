<aside class="w-72 min-h-screen bg-gray-800 text-gray-200">
    <div class="flex items-center justify-start mx-6 mt-10">
        <span class="text-gray-200 dark:text-gray-300 ml-4 text-2xl font-bold">
            M&A Kleid Admin
        </span>
    </div>
    <nav class="mt-10 px-6 ">
        <x-admin.sidebar-link label="Dashboard" url="/admin"></x-admin.sidebar-link>
        <x-admin.sidebar-link label="Products" url="/admin/products"></x-admin.sidebar-link>
        <x-admin.sidebar-link label="Orders" url="/admin/orders">
            {{-- <button type="button" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                <span class="p-1">
                    7
                </span>
            </button> --}}
        </x-admin.sidebar-link>
        <x-admin.sidebar-link label="Categories" url="/admin/subsubcategories"></x-admin.sidebar-link>
        <x-admin.sidebar-link label="Colors" url="/admin/colors"></x-admin.sidebar-link>
        <x-admin.sidebar-link label="Featured Images" url="/admin/featured-images"></x-admin.sidebar-link>
    </nav>
</aside>
