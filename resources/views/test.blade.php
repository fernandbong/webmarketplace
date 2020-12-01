<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @yield('title')
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

        <!-- all css here -->
        <link rel="stylesheet" href="{{asset('assets/css/test.css')}}">

    </head>
    <body>
        <div class="box1"></div>
        <div class="box2"></div>
        <div class="box3"></div>
    </body>
