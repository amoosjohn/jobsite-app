//Global
var timezone = localStorage.getItem('timezone')
var Common = Common || {};
//Define Module
Common.Config = (function(){
     
	var getApiUrl = function(){
        return  getAppUrl()+'/api';
    };
	var getAppUrl = function(){
		return $('base').attr('href');
	};
	var getAppAdminUrl = function(){
		// return appAdminUrl;
		return getAppUrl()+'/user';
	};
	var getImageUrl = function(){
		// return imageUrl;
		return getAppUrl();
	};
	var getImageAdminUrl = function(){
		// return imageAdminUrl;
		return getAppUrl()+'/images';
	};
	var getAssetUrl = function(){
		// return assetUrl;
		return getAppUrl()+'/files';
	};
	var getToken = function () {
		var token = '';
		try {
			token = localStorage.getItem('token');
		} catch (e) {
			return token;
		}
		return token;
	}
	var setToken = function(t){
		localStorage.setItem('Common_user', JSON.stringify(t));
	}
	var authenticate = function () {
		if (getToken() == null || getToken() == "") {
			window.location.href = getAppUrl()+'/signin';
		}
	};

	return {
		getApiUrl:getApiUrl,
		getAppUrl:getAppUrl,
		getAppAdminUrl:getAppAdminUrl,
		getImageUrl:getImageUrl,
		getImageAdminUrl:getImageAdminUrl,
		getAssetUrl:getAssetUrl,
		getToken:getToken,
		setToken:setToken,
		authenticate:authenticate
	}

}());

Common.App = (function () {
	var config = Common.Config;

	var init = function () {
		if (!window.console) window.console = {log: function(obj) {}};
		String.prototype.replaceAll = function(search, replacement) {
			var target = this;
			return target.replace(new RegExp(search, 'g'), replacement);
		};

	};
	var isValidUrl = function (url){
		var expression = /^(http(s)?:\/\/[a-zA-Z0-9\-_]+\.[a-zA-Z0-9]+(.)+)+$/;

		var regex = new RegExp(expression);
		if (!url.match(regex)) {
			return false;
		}
		return true;
	};

	var getFormValues = function(form) {
		var values = {};
		$.each($(form).serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});

		return values;
	};

	var youtubeNvimeoUrl = function (url){
		var expression = /^(http(s)\:\/\/www\.youtube\.com\/[a-zA-Z0-9]+(.)+|http(s)\:\/\/vimeo\.com\/[a-zA-Z0-9]+(.)+)$/;

		var regex = new RegExp(expression);
		if (!url.match(regex)) {
			return false;
		}
		return true;
	};

	var authenticate = function () {
		if (jsonLocalStorageData == null || jsonLocalStorageData == "") {
			window.location.href = config.getAppUrl()+'/admin';
		}
	};

	var randomPassword = function(length) {
	    var chars = "abcdefghijklmnopqrstuvwxyz1234567890";
	    var pass = "";
	    for (var x = 0; x < length; x++) {
	        var i = Math.floor(Math.random() * chars.length);
	        pass += chars.charAt(i);
	    }
	    return pass;
	};
	var isEmail = function(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	};
	var isNumberOnly = function (value) {
    	var er = /^([0-9]{11,14})$/;
    	return er.test(value);
	};

	var isYear = function(value) {
		var year = /^[0-9]{4}$/;
		return year.test(value);
	}

	var isPhoneNumber = function (value) {
    	var er = /^([0-9]{6,14})$/;
    	return er.test(value);
	};

	var minLimit = function(min,value){
    	if(value.length < min) {
      		return false;
     	} else {
      		return true;
     	}
    };

    var capitalizeFirstLetter= function (string) {
 		return string.charAt(0).toUpperCase() + string.slice(1);
	}

    //Show Alerts
	var showAlerts = function (alert_id,alert_type="",alert_message="",alert_status,time="5000"){
		var alert_class = "";
		if(alert_type=="error"){
			alert_class="alert-danger";
			remove_class="alert-success";
		}else{
			alert_class="alert-success";
			remove_class="alert-danger";
		}
		$(alert_id).addClass(alert_class).removeClass(remove_class).html(alert_message);
		if(alert_status=="show"){
			$(alert_id).show();
			// $(alert_id).fadeOut(time)
		}else{
			$(alert_id).hide();
		}
	};

	var panelLoader = function (loader_id,loader_status,time="5000"){
		// var loader_class = "";
		// if(loader_type=="error"){
		// 	loader_class="loader-danger";
		// 	remove_class="loader-success";
		// }else{
		// 	loader_class="loader-success";
		// 	remove_class="loader-danger";
		// }
		// $(loader_id).addClass(loader_class).removeClass(remove_class).html(loader_message);
		if(loader_status=="show"){
			$(loader_id).show();
			setTimeout(function(){
				$(loader_id).hide();
			},time);
		}else{
			$(loader_id).hide();
		}
	};

	//Show Spinner
	var displaySpinner = function(btn_id,spinner_status){
		if(spinner_status=="show"){
			$(btn_id).show();
		}else{
			$(btn_id).hide();
		}
	};

	var displayloader = function(btn_id,spinner_status){
			if(spinner_status=="show"){
				$(btn_id).show();
			}else{
				$(btn_id).hide();
			}
		};

	var formatDate = function(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'pm' : 'am';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes;
	  return  date.getFullYear()+ "-" + (date.getMonth()+1)  + "-" +date.getDate()+ "  " + strTime;
	};	


	return {
			init:init,
			isValidUrl:isValidUrl,
			authenticate:authenticate,
			randomPassword:randomPassword,
			isEmail:isEmail,
			capitalizeFirstLetter:capitalizeFirstLetter,
			isNumberOnly:isNumberOnly,
			isYear:isYear,
			isPhoneNumber:isPhoneNumber,
			minLimit:minLimit,
			youtubeNvimeoUrl:youtubeNvimeoUrl,
			showAlerts:showAlerts,
			panelLoader:panelLoader,
			displaySpinner:displaySpinner,
			displayloader:displayloader,
			getFormValues: getFormValues,
			formatDate:formatDate,
	};

}());

Common.Auth= (function(){
	var config 		 = 	Common.Config;
    var dataApiUrl 	 = config.getApiUrl();
    var dataAppUrl 	 = config.getAppUrl();
    var dataTokenGet =  config.getToken();

	var signin = function (formData) {

		$('#sign-in').html("<i class='fa fa-spinner fa-spin'></i>").attr('disabled', true);

      	if ( formData.get('confirm-password') && formData.get('password') !== formData.get('confirm-password') ) {
      		$('#login-msg').html("Confirm password must be same as new password").removeClass('alert-success').addClass('alert-danger').show().delay(1000).fadeOut(function(){
      			$('#sign-in').html("Proceed").attr('disabled', false);
           	});

      	}else{

      		var jsonData = $('#login-user-form').serialize();

			var request = $.ajax({
	            url:  dataApiUrl +'/login',
	            data: jsonData+'&req=web',
	            type: 'POST',
	            dataType:'json',
	         });

			request.done(function(data){

				$('#sign-in').html("Login").attr('disabled', false);

	            if(data.response.code === 200 ){
	              	$('#login-msg').html("You have been logged in successfully").removeClass('alert-danger').addClass('alert-success').show().delay(2000).fadeOut(function(){
	                  	$(this).removeClass('alert-success');
	                  	localStorage.setItem('token', data.response.data.access_token )
	                  	localStorage.setItem('timezone', data.response.data.timezone )
	                  	window.location.href =  dataAppUrl + '/dashboard';
	               	});
	            }
			});

			request.fail(function(jqXHR, textStatus){

				$('#sign-in').html("Login").attr('disabled', false);

				var jsonResponse = $.parseJSON(jqXHR.responseText);
				var html = '';
				for(var i in jsonResponse.error.messages) {
					html += jsonResponse.error.messages[i];
				}
				Common.App.showAlerts("#login-msg","error",'<i class="icon-report"></i>'+html,"show",3000);
			});

      	}

		
	};

	var signup = function (username,email,password) {

		$('.centered').show()
		
		var jsonData = {		
			email:email,
			password:password,
			username:username,
			}

		var request = $.ajax({
			url: dataApiUrl+'/registration',
			data: jsonData,
			type: 'POST',
			dataType:'json'
		});
		request.done(function(data){
			$('.centered').hide()

			Common.App.displaySpinner("#signup","hide");
			if(data.response.code == 200) {
					config.setToken(data.response.data.token);
					window.location.href= dataAppUrl+'/holder';
			} 

		});
		request.fail(function(jqXHR, textStatus){
				Common.App.displaySpinner("#signup","hide");
				
				var jsonResponse = $.parseJSON(jqXHR.responseText);
				var html = '';

				for(var i in jsonResponse.error.messages) {
					html += jsonResponse.error.messages[i];
				}
				Common.App.showAlerts("#sign_up_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	};

	var view = function (id) {

		var jsonData = {		
			id:id
			}

		var request = $.ajax({
			url: dataApiUrl+'admin/view',
			data: jsonData,
			type: 'GET',
			dataType:'json'
		});
		request.done(function(data){
			// $('.centered').hide()

			// Common.App.displaySpinner("#signup","hide");
			if(data.response.code == 200) {
					// config.setToken(data.response.data.token);
					// window.location.href= dataAppUrl+'/holder';

				console.log(data)
			} 

		});
		request.fail(function(jqXHR, textStatus){
				Common.App.displaySpinner("#signup","hide");
				
				var jsonResponse = $.parseJSON(jqXHR.responseText);
				var html = '';

				for(var i in jsonResponse.error.messages) {
					html += jsonResponse.error.messages[i];
				}
				Common.App.showAlerts("#sign_up_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	};

	var create = function (data) {

		var jsonData = {		
			username : data['username'],
			password : data['password'],
			email : data['email'],
			store : data['store'],
			key : (typeof data['key'] !== 'undefined') ? data['key'] : "" ,
		}

		var request = $.ajax({
			url: dataApiUrl+'/admin/create',
			data: jsonData,
			type: 'POST',
			dataType:'json',
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});
		request.done(function(data){
			if(data.response.code == 200) {
			Common.App.showAlerts(".alert-box","","Request Accepted.","show",3000);
				// config.setToken(data.response.data.token);
				// window.location.href= dataAppUrl+'/holder';
				// console.log(data)
				location.reload()
			} 

		});
		request.fail(function(jqXHR, textStatus){
				// Common.App.displaySpinner("#signup","hide");
				
				var jsonResponse = $.parseJSON(jqXHR.responseText);
				var html = '';

				for(var i in jsonResponse.error.messages) {
					html += jsonResponse.error.messages[i];
				}
				// Common.App.showAlerts("#sign_up_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	};

	var remove = function (id , btn) {
		// Common.App.displaySpinner("#removeById","show");
		
		var jsonData = {
			id:id,
		}
		var request = $.ajax({
			url: dataApiUrl+'/admin/remove',
			data: jsonData,
			type: 'POST',
			dataType:'json',
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});

		request.done(function(data){
			// Common.App.displaySpinner("#removeById","hide");
			if(data.response.code == 200) {	
				btn.remove();
				// Common.App.showAlerts("#create-message","success",'<i class="icon-report"></i> Removed Successfully.',"show",10000);
				// location.reload()
			} 
		});
		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts("#update_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	}; 	

	var forgotpassword = function (email) {
		$('#sign-in').html("<i class='fa fa-spinner fa-spin'></i>").attr('disabled', true);
		
		var jsonData = {
			email:email,
		}

		var request = $.ajax({
			url: dataApiUrl+'/forgot-password',
			data: jsonData,
			type: 'put',
			dataType:'json'
		});

		request.done(function(data){
			Common.App.displaySpinner("#forgotpassword_message","hide");
			if(data.response.code == 200) {	
				$('#sign-in').html("Forgot Password").attr('disabled', false);
				Common.App.showAlerts("#forgotpassword_message","success",'<i class="icon-report"></i>'+data.response.messages,"show",10000);
			} 
		});
		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#forgotpassword_message","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts("#forgotpassword_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	};

	var resetPassword = function (token,password,confirmpassword) {
			Common.App.displaySpinner("#reset_loading","show");
			
			var jsonData = {
				token:token,
				password:password,
				confirmpassword:confirmpassword,
			}

			var request = $.ajax({
				url: dataApiUrl+'/changepassword',
				data: jsonData,
				type: 'POST',
				dataType:'json'
			});

			request.done(function(data){
				Common.App.displaySpinner("#reset_loading","hide");
				if(data.response.code == 200) {	
					Common.App.showAlerts("#reset_password-message","alert-success",'<i class="icon-report"></i>'+data.response.messages,"show");
					config.setToken(data.response.data.token);
					window.location.href= dataAppUrl+'/admin/dashboard';
				} 
			});

			request.fail(function(jqXHR, textStatus){
				Common.App.displaySpinner("#reset_loading","hide");
				
				var jsonResponse = $.parseJSON(jqXHR.responseText);
				var html = '';

				for(var i in jsonResponse.error.messages) {
					html += jsonResponse.error.messages[i];
				}
				Common.App.showAlerts("#reset_password-message","error",'<i class="icon-report"></i>'+html,"show");
			});
	};

	var signout = function(){
		
		$('.centered').fadeIn()
		var request = $.ajax({

			url: dataApiUrl+'/logout',
			data: {},
			type: 'POST',
			dataType:'json',
			headers: {"Authorization":"Bearer "+dataTokenGet} 
		});

		request.done(function(data){

			window.localStorage.removeItem('Cakeaway_user');
		    var url = dataAppUrl+'/admin';
		    window.location.href = url;
			// $('.centered').hide()

		});
		request.fail(function(jqXHR, textStatus){
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			if (jsonResponse.error.code == 401) {
				window.location.href = dataAppUrl+'/';
			}
		});
	};

	return {
	    signin:signin,
	    create:create,
	    forgotpassword:forgotpassword,	
	    resetPassword:resetPassword,
	    signup:signup,
	    signout:signout,
	    remove:remove,
	};

}());

Common.User= (function(){
	var config 		 = 	Common.Config;
    var dataApiUrl 	 = config.getApiUrl();
    var dataAppUrl 	 = config.getAppUrl();
    var dataTokenGet =  config.getToken();

    //user update
	var create = function (data) {
		var type = data.get("type")

		Common.App.displaySpinner("#reponse_loading","show");
		var url = "";
        if ( typeof data.get('key') !== "undefined" && data.get('key') ) {
            url = '/product/update';
        }else{
            url = '/product/create';
        }

		var request = $.ajax({
			url: dataApiUrl+url,
			data: data,
			type: 'POST',
			contentType: false,
            processData: false,
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});

		request.done(function(data){
			if(data.response.code == 200) {	

			}
		});
		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts(".response_messages","error",'<i class="icon-report"></i>'+html,"show",8000);
		});
	}; 	

	var list = function (page) {

		var request = $.ajax({
			url: dataWebUrl+url,
			data: {},
			type: 'GET',
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});

		request.done(function(data){
			if(data.response.code == 200) {	
				Common.App.displaySpinner("#reponse_loading","hide");

				var pram = window.location.href.split('?').slice(1)[0]

				if (typeof pram !== "undefined" ) {
					window.location.href = dataAppUrl+"/products?filter_by_type="+pram.split('=')[1];
				}else{
					window.location.href = dataAppUrl+"/products";
				}
			}
		});

		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts(".response_messages","error",'<i class="icon-report"></i>'+html,"show",8000);
		});
	};	

	var update = function (data) {
	
		var request = $.ajax({
			url: dataApiUrl+'/update-profile',
			data: data,
			type: 'POST',
			contentType: false,
            processData: false,
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});


		request.done(function(data){
			Common.App.displaySpinner("#update","hide");
			if(data.response.code == 200) {	
				Common.App.showAlerts("#update-msg","success",'<i class="icon-report"></i>'+data.response.messages,"show",50000);
				$('#user_update').hide();	
				window.location.href = dataAppUrl+"/business-user-profile";
			} 
		});

		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts("#update_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	}; 

	var block = function(block_user_id, is_block){

		var jsonData = {
			block_user_id : block_user_id,
			is_block : is_block,
		};

		var request = $.ajax({

	         url: $('.server-url').val()+'/api/block',
	         data: jsonData,
	         type: 'POST',
	         dataType:'json',
	         headers: {"Authorization": "Bearer "+localStorage.getItem('token')}
	      });
	      request.done(function(data){

	         if(data.response.code == 200 ){
	            window.location.reload()
	         }
	      });	
	};

	var remove = function (id , btn) {
		
		var request = $.ajax({
			url: dataApiUrl+'/user/remove/'+id,
			type: 'GET',
			dataType:'json',
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});

		request.done(function(data){
			if(data.response.code == 200) {	
				btn.parent().parent().remove();
				$("#confirmation-modal").modal('hide');
			} 
		});
		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts("#update_message","error",'<i class="icon-report"></i>'+html,"show");
		});
	}; 	

	return {
		create:create,
	    update:update,
	    block:block,
	    remove:remove,
	};

}());

Common.Package = ( function(){

	var config 		 = 	Common.Config;
    var dataApiUrl 	 = config.getApiUrl();
    var dataAppUrl 	 = config.getAppUrl();
    var dataTokenGet =  config.getToken();

    var bookings = [];

	var update = function (data, btn) {

		btn.html("<i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
		var request = $.ajax({
			url: dataApiUrl+'/update_package',
			data: data,
			type: 'POST',
			headers: {"Authorization":"Bearer "+dataTokenGet},
		});

		request.done(function(data){
			btn.html("Save").attr('disabled', false);
			if(data.response.code == 200) {	
				location.reload();	
			} 
		});

		request.fail(function(jqXHR, textStatus){
			
			btn.html("Save").attr('disabled', false);
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts(".res-messages","error",'<i class="icon-report"></i>'+html,"show",10000);
		});
	}; 	

	return {
	    update:update
	};

}());

Common.CMS= (function(){
	var config 		 = 	Common.Config;
    var dataApiUrl 	 = config.getApiUrl();
    var dataAppUrl 	 = config.getAppUrl();
    var dataTokenGet =  config.getToken();

	var update = function (data) {
		
		var jsonData = {
			title: data['title'],
			content: data['content'],
		}

		var request = $.ajax({
			url: dataAppUrl+'/content/update',
			data: jsonData,
			type: 'POST',
			dataType:'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		});

		request.done(function(data){
			Common.App.displaySpinner("#update","hide");

			if(data.response.code == 200) {	

				var html = '';

				for(var i in data.response.messages) {
					html += data.response.messages[i];
				}
				console.log(data)
				Common.App.showAlerts("#update_message","success",'<i class="icon-report"></i>'+html,"show", 1000);
			} 
		});
		request.fail(function(jqXHR, textStatus){

			Common.App.displaySpinner("#reponse_loading","hide");
			
			var jsonResponse = $.parseJSON(jqXHR.responseText);
			var html = '';

			for(var i in jsonResponse.error.messages) {
				html += jsonResponse.error.messages[i];
			}
			Common.App.showAlerts("#update_message","error",'<i class="icon-report"></i>'+html,"show", 5000);
		});
	}; 	

	return {
	    update:update,
	};

}());

Common.App.init();









