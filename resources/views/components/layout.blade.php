<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color:rgb(230,239,230)"> 
    <x-navbar></x-navbar>
    {{ $slot }}
</body>
</html>