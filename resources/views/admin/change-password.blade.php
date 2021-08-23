@extends('admin.layout.inside')
@section('content')
<div id="content" class="app-content box-shadow-0" role="main">
            <!-- Header -->
            @include('admin.common.header')
            <!-- Main -->
            <div class="content-main " id="content-main">
               <!-- ############ Main START-->
               <div class="padding">

                  <div class="row">
                    <!-- <div class="col-sm-6">
                      
                      <div class="box">
                         <div class="box-header">
                            <h2>Profile</h2>
                         </div>
                         <div class="box-divider m-0"></div>
                         <div class="box-body">
                            <div class="form-group">
                              <label class="col-form-label">Emails</label>
                              <input type="email" class="form-control" placeholder="" disabled="" value="{{$email}}">
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Support Number</label>
                              <input type="text" class="form-control" id="phone" name="phone_number" placeholder="" required value="{{$phone_number}}">
                            </div>

                            <div class="alert" id="update-profile-msg" style="display:none;"></div>

                            <a href="javascript:;" class="btn blue-bsn-btn" id="update-profile">
                               <i class="fa fa-spinner fa-spin icon-spinner" id="change-password-spin" style="display: none"></i>
                               <span id="change-password-text">Update</span>
                            </a>
                         </div>
                      </div>

                      

                    </div> -->

                    <div class="offset-sm-3 col-sm-6">
                      <div class="box">
                         <div class="box-header">
                            <h2>Change Password</h2>
                         </div>
                         <div class="box-divider m-0"></div>
                         <div class="box-body">
                            <form id="change-password-form">
                                <div class="form-group">
                                  <label class="col-form-label">Old Password</label>
                                  <input type="password" class="form-control" id="old_password" aria-describedby="emailHelp" placeholder="" required>
                                </div>
                               <div class="form-group">
                                  <label class="col-form-label">New Password</label>
                                  <input type="password" class="form-control" id="new_password" aria-describedby="emailHelp" placeholder="" required>
                               </div>
                               <div class="form-group">
                                  <label class="col-form-label">Confirm New Password</label>
                                  <input type="password" class="form-control" id="confirm_new_password" aria-describedby="emailHelp" placeholder="" required>
                               </div>
                               
                                <div class="alert" id="change-password-msg" style="display:none;"></div>
                                <a href="javascript:;" class="btn blue-bsn-btn" id="change-password">
                                   <i class="fa fa-spinner fa-spin icon-spinner" id="change-password-spin" style="display: none"></i>
                                   <span id="change-password-text">Save</span></a>
                            </form>
                         </div>
                      </div>  
                    </div>
                    
                  </div>

               </div>
               <!-- ############ Main END-->
            </div>
            
            <!-- Footer -->
            @include('admin.common.footer')
         </div>

         <input type="hidden" class="server-url" value="{{ url('/') }}">
         @endsection

@section('scripts')
<script>
     $(document).ready(function(){

        $('#change-password').unbind('click').bind('click', function(e){
         
            var oldpassword = $('#old_password').val();
            var newPass = $('#new_password').val();
            var newConfirmPass = $('#confirm_new_password').val();

            var jsonData = {
               new_password : newPass,
               confirm_new_password: newConfirmPass,
               old_password : oldpassword

            };

            var request = $.ajax({

               url: $('.server-url').val()+'/public/api/change-password',
               data: jsonData,
               type: 'POST',
               dataType:'json',
               headers: {"Authorization": "Bearer "+localStorage.getItem('token')}
            });
            request.done(function(data){

               $('#change-password-spin').hide();
               $('#change-password-text').show();

               if( typeof data.response != "undefined" && data.response.code == 200 ){
                     var messgaeHtml = '';
                     $.each(data.response.messages, function(i, message){
                           console.log(message);
                           messgaeHtml += '<p>' + message +'</p>'
                     });
                     $('#change-password-msg').html(messgaeHtml).removeClass('alert-danger').addClass('alert-success').show().delay(2000).fadeOut(function(){
                        $('#notification-content').val('');
                        $(this).html('');
                        $(this).removeClass('alert-success');
                        window.location.href = $('.server-url').val()+'/admin'
                     });
                  }

                  if( typeof data.error != "undefined" && data.error.code == 401 ){
                     var messgaeHtml = '';
                     $.each(data.error.messages, function(i, message){
                      
                           console.log(message);
                           messgaeHtml += '<p>' + message +'</p>'
                     });
                     $('#change-password-msg').html(messgaeHtml).removeClass('alert-success').addClass('alert-danger').show();
                  }
            });
        });

        $('#update-profile').unbind('click').bind('click', function(e){

            var jsonData = {
              phone_number : $("input[name=phone_number]").val(),
            };

            var request = $.ajax({
               url: $('.server-url').val()+'/public/api/update-profile',
               data: jsonData,
               type: 'POST',
               dataType:'json',
               headers: {"Authorization": "Bearer "+localStorage.getItem('token')}
            });
            request.done(function(data){

               $('#change-password-spin').hide();
               $('#change-password-text').show();

               if( typeof data.response != "undefined" && data.response.code == 200 ){

                     var messgaeHtml = '';
                     $.each(data.response.messages, function(i, message){
                           messgaeHtml += '<p>' + message +'</p>'
                     });

                     $('#update-profile-msg').html(messgaeHtml).removeClass('alert-danger').addClass('alert-success').show().fadeOut(2000);
                  }

                  if( typeof data.error != "undefined" && data.error.code == 401 ){
                     var messgaeHtml = '';
                     $.each(data.error.messages, function(i, message){
                      
                           console.log(message);
                           messgaeHtml += '<p>' + message +'</p>'
                     });
                     $('#update-profile-msg').html(messgaeHtml).removeClass('alert-success').addClass('alert-danger').show();
                  }
            });
        });

     });
</script>
@endsection



