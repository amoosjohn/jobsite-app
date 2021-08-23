@extends('admin.layout.outside')
@section('content')
<div id="content-body">
    <div class="py-5 text-center w-100">
      <div class="mx-auto w-xxl w-auto-xs">
        <div class="px-3">

          <form name="form">
            <div class="form-group">
            <img src="{{ url('assets/images/logosss.png')}}" style="width: 200px">
          </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" id="forgot-password-email" required>
            </div>    
            <div class="alert" id="forgot-pass-msg" style="display:none;"></div>
            <button type="submit" class="btn primary" id="forgot-pass-btn">Submit</button>
          </form>
          <input type="hidden" class="server-url" value="{{ url('/') }}">
          <!-- <div>
            Do not have an account? 
            <a href="signup.html" class="text-primary _600">Sign up</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  @endsection
@section('scripts')
  <script>
    $(document).ready(function(){
        $('#forgot-pass-btn').click(function(e){
          e.preventDefault();

          var jsonData = {
            email : $('#forgot-password-email').val()
          };

         var request = $.ajax({

            url:  $('.server-url').val() +'/api/forgot-password',
            data: jsonData,
            type: 'PUT',
            dataType:'json',
         });
         request.done(function(data){

            if(data.response.code === 200 ){
              
              $('#forgot-pass-msg').html("An email has been sent with new password.").removeClass('alert-danger').addClass('alert-success').show().delay(2000).fadeOut(function(){
                  $(this).html('');
                  $(this).removeClass('alert-success');
                  $('#myModal').modal('hide');
                  window.location.href = $('.server-url').val()+'/login';
               });
              
            }
            
         });


        });
    });
  </script>
@endsection
