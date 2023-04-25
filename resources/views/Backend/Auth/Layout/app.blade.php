<!DOCTYPE html>
<html lang="es">

<head>
    @include('Backend.Auth.Layout.common-head')
</head>

<body class="bg-gray-200">

    @include('Backend.Auth.Layout.sidebar')
    <main class="main-content  mt-0">
        @include('Backend.Auth.Layout.header')

        @yield('main-content')

        @include('Backend.Auth.Layout.footer')
    </main>
    @include('Backend.Auth.Layout.common-end')
    @stack('custom-scripts')
</body>

</html>
