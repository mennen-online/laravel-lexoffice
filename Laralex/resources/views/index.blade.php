<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Start - Laralex</title>
    <link rel="stylesheet" href="{{ asset('mennen-online/laralex/css/app.css') }}" />

</head>
<body>
<div id="app">
    <div class="grid grid-cols-4">
        <div class="">

            <sidenav></sidenav>
        </div>

        <div class="col-span-3"></div>

    </div>


</div>
<script src="{{ asset("mennen-online/laralex/js/app.js") }}"></script>
</body>
</html>