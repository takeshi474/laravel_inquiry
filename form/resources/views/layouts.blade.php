<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>laravel - @yield('Laravel')</title>

    </head>
    <body>
      @section('sidebar')
        <!--  -->
      @show

      <div class="container">
        @yield('content')
      </div>
    </body>
</html>
