<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
<script src="{{ url( 'libs/jquery/dist/jquery.min.js' ) }}"></script>

<!-- Bootstrap -->
  <script src="{{ url( 'libs/popper.js/dist/umd/popper.min.js' ) }}"></script>
  <script src="{{ url( 'libs/bootstrap/dist/js/bootstrap.min.js' ) }}"></script>
<!-- core -->
  <script src="{{ url( 'libs/pace-progress/pace.min.js' ) }}"></script>

  <script src="{{ url( 'scripts/lazyload.config.js' ) }}"></script>
  <script src="{{ url( 'scripts/lazyload.js' ) }}"></script>
  <script src="{{ url( 'scripts/plugin.js' ) }}"></script>
  <script src="{{ url( 'scripts/nav.js' ) }}"></script>
  <script src="{{ url( 'scripts/scrollto.js' ) }}"></script>
  <script src="{{ url( 'scripts/toggleclass.js' ) }}"></script>
  <script src="{{ url( 'scripts/theme.js' ) }}"></script>
  <script src="{{ url( 'scripts/ajax.js' ) }}"></script>
  <script src="{{ url( 'scripts/app.js' ) }}"></script>

  <script src="{{ url( 'js/commonScript.js' ) }}"></script>


  <script>
    $("#redirection-link").unbind('click').click(function(){
      $("#overlay").hide();
    });
  </script>
