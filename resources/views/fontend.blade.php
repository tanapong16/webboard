<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
         <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
       
    </head>
    <body>
       @include('navbar')
            <div class="container">
                <div class="row mt-2">   
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>             
        @include('footersc')
    </body>
</html>