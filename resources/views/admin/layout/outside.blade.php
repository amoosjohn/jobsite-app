<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Job Site Admin Panel</title>
  <meta name="description" content="Social Media Desk Application" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="{{ url('/') }}">
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.svg">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{ url('assets/images/logo.png') }}">

  @include('admin.common.css')
  <!-- endbuild -->

</head>
<body>

<div class="d-flex flex-column flex" id="login-bg" >
  @yield('content')
</div>

<!-- include('admin.common.js') -->
@yield('scripts')


<script>

    $(document).ready(function() {

        /*var checkToken = localStorage.getItem('token');

        if( typeof checkToken == "undefined" || checkToken == null ){
          window.location.href = $('.server-url').val()+'/login';
        } */

        $(".refreshLink").click(function (e) {
            e.preventDefault();
            window.location.href = $(this).attr('href');
        });

        $('.refreshLink').each(function(key){
            if ( $(this).attr('href') == location.href ) {
                if ( $(this).parent().parent().parent().is('li') ) {
                    $(this).parent().parent().parent().addClass('active')
                }else{
                    $(this).parent().addClass('active')
                }
            }
        })

    });


</script>
<!-- endbuild -->
</body>
</html>
