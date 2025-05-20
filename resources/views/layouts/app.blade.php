<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/icon.png') }}">
    <!-- Page Title  -->
    <title>{{ config('app.name', 'Point of Sales') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/editors/quill.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/editors/quill.rtl.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admin/css/theme.css') }}">
    @livewireStyles
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script> --}}

    <style>
        .star-rating {
            direction: rtl;
            font-size: 1.8rem;
            unicode-bidi: bidi-override;
            display: inline-flex;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            cursor: pointer;
            padding: 0 5px;
            transition: color 0.2s;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5b301;
        }
    </style>

    @stack('css')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('layouts.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('layouts.header')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        @include('layouts.breadcrumb')
                                        <!-- .nk-block-head-content -->
                                    </div>
                                    <!-- .nk-block-between -->
                                </div>
                                <!-- .nk-block-head -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                @include('layouts.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/admin/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/charts/gd-default.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/datatable-btns.js') }}"></script>
    <script src="{{ asset('assets/admin/js/example-sweetalert.js') }}"></script>
    <script src="{{ asset('assets/admin/js/example-toastr.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/editors/quill.css') }}">
    <script src="{{ asset('assets/admin/js/libs/editors/quill.js') }}"></script>
    <script src="{{ asset('assets/admin/js/editors.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/tagify.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @livewireScripts
    @stack('js')
</body>

</html>
