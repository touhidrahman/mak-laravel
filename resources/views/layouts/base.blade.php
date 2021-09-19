<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet" type="text/css" />

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    @yield('body')

    @include('sweetalert::alert')

    @livewireScripts


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var categorySelector = $('select[name="category_id"]');
            var subcategorySelector = $('select[name="subcategory_id"]');
            var subsubcategorySelector = $('select[name="subsubcategory_id"]');

            categorySelector.on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/categories/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            subcategorySelector.empty();
                            subcategorySelector.append('<option value="" selected disabled>Please select</option>');
                            $.each(data, function(key, value) {
                                subcategorySelector.append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>'
                                );
                            });
                        },
                    });
                }
            });

            subcategorySelector.on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategories/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            subsubcategorySelector.empty();
                            subsubcategorySelector.append('<option value="" selected disabled>Please select</option>');
                            $.each(data, function(key, value) {
                                subsubcategorySelector.append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>'
                                );
                            });
                        },
                    });
                }
            });
        });
    </script>

</body>

</html>
