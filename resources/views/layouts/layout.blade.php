<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('includes.meta')

    <title>{{ config('app.name', 'EcoFruit') }}</title>

    <!-- Styles -->
    @include('includes.css')

</head>
<body>
    <div id="site">
        @include('includes.header')

        @yield('content')
    </div>

    <!-- Scripts -->
    @include('includes.script')
</body>


</html>
