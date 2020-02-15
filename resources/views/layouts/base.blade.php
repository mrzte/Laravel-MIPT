<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MIPT</title>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  </head>
  <body class="hold-transition sidebar-mini" >
  <div class="wrapper" id="app">
   @include('partials.navbar')
   @include('partials.main-sidebar')
  <div class="content-wrapper">
   @include('partials.header')
   @include('partials.konten')         
  </div>
   @include('partials.footer') 
  </div>
  
  <script src="/js/app.js"></script>
  </body>
</html>

