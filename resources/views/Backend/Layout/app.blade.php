<!DOCTYPE html>
<html lang="es">

<head>
    @include('Backend.Layout.common-head')
    @stack('custom-css')
    @stack('custom-js-jquery')
    @livewireStyles

</head>

<!--<body class="g-sidenav-show  bg-gray-200">-->

<body class="g-sidenav-show bg-gray-200 g-sidenav-pinned">
    @include('Backend.Layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('Backend.Layout.header')


        @yield('main-content')
        @include('Backend.Layout.footer')
    </main>
    @include('Backend.Layout.common-end')
    @stack('custom-scripts')

    @livewireScripts

</body>

</html>
