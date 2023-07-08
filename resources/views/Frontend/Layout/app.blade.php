<!DOCTYPE html>
<html lang="es">

<head>
    @include('Frontend.Layout.common-head')
    @stack('costum-css')
</head>

<body>

    @include('Frontend.Layout.header')


    @yield('main-content')


    @include('Frontend.Layout.footer')



    @include('Frontend.Layout.common-end')
    @stack('costum-js')
</body>

</html>
