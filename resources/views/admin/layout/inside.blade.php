<!DOCTYPE html>
<html lang="en">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <title>Job site Admin Panel</title>
      <link rel="shortcut icon" sizes="196x196" type="image/png" href="{{url('public/assets/images/logo.png')}}"/>
      <meta name="description" content="Social Media Desk Application" />

      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- for ios 7 style, multi-resolution icon of 152x152 -->
      <base href="{{ url('/') }}">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
      <link rel="apple-touch-icon" href="../assets/images/logo.svg">
      <meta name="apple-mobile-web-app-title" content="Flatkit">
      <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="csrf-token" content="{{ Session::get('_token') }}" />

      <!-- THESE META TAG IS USE FOR NON CACHE THE CSS SCRIPTS -->
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" />

      <!-- style -->
      @include('admin.common.css')
      <!-- endbuild -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>

     <style>
       thead tr{
         background: #19222d !important;
         /*background: #8b97a4 !important;*/
         color: #d5d9dc !important;
       }
       .card {
          box-shadow: 5px 5px 20px #8888884f;
       }
     </style>
   </head>
   <body>
      <div class="app" id="app">
         @include('admin.common.sidebar')
         @yield('content')
      </div>
      @include('admin.common.js')
      <!-- scripts -->
      @yield('scripts')
      <!-- endbuild -->
        <!-- <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase.js"></script>
        <script src="{{ url('public/js/fcm.js') }}"></script> -->
   </body>
</html>
