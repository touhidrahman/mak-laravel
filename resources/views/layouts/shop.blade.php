<!doctype html>
<html lang=lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <meta property="og:title" content="M&A Kleid" />
    <meta property="og:locale" content="de_DE" />
    <meta name="theme-color" content="#f35627" />
    <link rel="canonical" href="https://www.makleid.de/" />
    <meta property="og:url" content="https://www.makleid.de/" />
    <meta name="description" content="" />
    <meta property="og:site_name" content="M&A Kleid" />
    <meta property="og:image" content="" />
    <link rel="icon" type="image/png" href="{{ url(asset('img/favicon.png')) }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" integrity="sha256-imWjOiEEAcjWdL1+inhBu1dWYFyXuiO9vpJVEQd3y/c=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

    @livewireStyles

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        html {
            @apply font-medium antialiased;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .container {
            max-width: theme("screens.2xl");
        }

        .form-input,
        .form-textarea {
            @apply font-normal text-secondary py-3 px-5 border border-grey-darker rounded w-full focus: border-primary focus:ring-primary;
        }

        .form-select {
            @apply font-normal text-secondary-lighter py-2 px-4 border border-grey-darker rounded w-full focus: border-primary focus:ring-primary;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23f35627' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        }

        .form-checkbox,
        .form-radio {
            @apply border border-grey-darker rounded text-primary focus: ring-primary;
        }

        .tab-item.active {
            @apply bg-grey-light border-primary;
        }

        .tab-pane {
            @apply absolute top-0 opacity-0 pointer-events-none z-0 w-full;

            &.active {
                @apply relative opacity-100 pointer-events-auto z-10;
            }
        }

        .item-height {
            @apply max-h-0;

            &.active {
                @apply max-h-infinite;
            }
        }

        .c-hero-gradient-bg {
            background-image: linear-gradient(90deg, rgba(55, 36, 31, 1) 40%, rgba(0, 0, 0, 0) 100%);
        }

        .btn {
            @apply transition-all duration-300 px-8 py-4 inline-block rounded font-semibold uppercase tracking-wide text-center;

            &:focus {
                @apply outline-none;
            }
        }

        .btn-primary {
            @apply text-white bg-primary;

            &:hover {
                @apply bg-primary-light;
            }
        }

        .btn-outline {
            @apply bg-white text-primary border border-primary;

            &:hover {
                @apply bg-primary text-white;
            }
        }

        .btn-lg {
            @apply text-xl;
        }

        .btn-sm {
            @apply text-sm;
        }

        .glide__bullet--active {
            @apply bg-primary;
        }

        .glide--swipeable {
            cursor: default !important;
        }

    </style>
</head>


<body x-data="{
        modal: false,
        mobileMenu: false,
        mobileSearch: false,
        mobileCart: false,
        showModal: false
    }" :class="{ 'overflow-hidden max-h-screen': modal || mobileMenu }" @keydown.escape="modal = false"
    @keydown.escape="showModal = false">

    @yield('body')

    @include('sweetalert::alert')



    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js" integrity="sha256-CnNQJd80jPuIDyeQRRq7+Wgt+++Kl0dZLt4ETNmxMIw=" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css" integrity="sha256-Ev8y2mML/gGa4LFVZgNpMTjKwj34q4pC4DcseWeRb9w=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css" integrity="sha256-sw/JiPOV1ZfcXjqBJT1vqaA4vBGeiqn+b7PDhVv4OA4=" crossorigin="anonymous" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewire('livewire-ui-modal')
    @livewireScripts

    <script>
        function collectionSliders() {
            document
                .querySelectorAll(".collection-slider")
                .forEach(slider => {
                    new Glide(slider, {
                            autoplay: 2000,
                            type: "carousel",
                            perView: 3,
                            gap: 30,
                            breakpoints: {
                                1440: {
                                    perView: 2,
                                },
                                1024: {
                                    perView: 2,
                                },
                                768: {
                                    perView: 2,
                                },
                                600: {
                                    perView: 1,
                                }
                            },
                        })
                        .mount();
                });
        }

        function postSlider() {
            new Glide(".posts-slider", {
                    type: "carousel",
                    startAt: 1,
                    perView: 3,
                    gap: 0,
                    peek: {
                        before: 50,
                        after: 50,
                    },
                    breakpoints: {
                        1024: {
                            perView: 3,
                            peek: {
                                before: 20,
                                after: 20,
                            },
                        },
                        768: {
                            perView: 2,
                            peek: {
                                before: 10,
                                after: 10,
                            },
                        },
                        600: {
                            perView: 1,
                            peek: {
                                before: 0,
                                after: 0,
                            },
                        },
                    },
                })
                .mount();
        }
    </script>

</body>

</html>
