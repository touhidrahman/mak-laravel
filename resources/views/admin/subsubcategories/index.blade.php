@extends('layouts.auth')

@section('content')

    <h1 class="text-2xl font-bold mb-10">Sub-subcategories</h1>

    @include('admin.admin-categories-toolbar')


    <section class="mt-10">


        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Category
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Subcategory
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Sub-subcategory
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Product Counts
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsubcategories as $subsubcategory)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $subsubcategory->category?->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $subsubcategory->subcategory?->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $subsubcategory->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                        </span>
                                        <span class="relative">
                                            0
                                        </span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="{{ route('admin.subsubcategories.edit', $subsubcategory->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                    <button @click="showModal = true"
                                        class="ml-2 bg-transparent text-indigo-600 hover:text-indigo-900">
                                        Delete
                                    </button>
                                    <x-modal.delete title="Delete {{ $subsubcategory->name }}?"
                                        actionRoute="{{ route('admin.subsubcategories.delete', $subsubcategory->id) }}">
                                    </x-modal.delete>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="bg-white">
                    {{ $subsubcategories->links() }}
                </div>
            </div>
        </div>

    </section>


@endsection
