var config = {
    apiKey: "AIzaSyAAt5sukgaqott64yhfT8zPd-JcuHmVtdA",
    authDomain: "nowaitingrooms-80f7a.firebaseapp.com",
    databaseURL: "https://nowaitingrooms-80f7a.firebaseio.com",
    projectId: "nowaitingrooms-80f7a",
    storageBucket: "nowaitingrooms-80f7a.appspot.com",
    messagingSenderId: "698424667325",
    appId: "1:698424667325:web:7dc980facde884afcedbd4",
    measurementId: "G-Z20K00S9VN"
};

firebase.initializeApp(config);

const messaging = firebase.messaging();

messaging.usePublicVapidKey('BLVEQh0IDcStIBmk0AVyeH6yjw4b86Y4kNLBebKfaLx6hHLJqwQS6H2PEjHuJQy4duD2AhF6-C9ZeA__mLAtENE');

// IDs of divs that display Instance ID token UI or request permission UI.
requestPermission();
// [START refresh_token]
// Callback fired if Instance ID token is updated.

// Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken().then((currentToken) => {
  if (currentToken) {
    console.log(currentToken);
    update_fcm(currentToken)
      
    //sendTokenToServer(currentToken);
    //updateUIForPushEnabled(currentToken);
  } else {
    // Show permission request.
    console.log('No Instance ID token available. Request permission to generate one.');
    // Show permission UI.
    //updateUIForPushPermissionRequired();
    //setTokenSentToServer(false);
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  //showToken('Error retrieving Instance ID token. ', err);
  //setTokenSentToServer(false);
});



function requestPermission() {
    console.log('Requesting permission...');
    // [START request_permission]
    messaging.requestPermission().then(function() {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // [START_EXCLUDE]
        // In many cases once an app has been granted notification permission, it
        // should update its UI reflecting this.
        //resetUI();
        // [END_EXCLUDE]
    }).catch(function(err) {
        console.log('Unable to get permission to notify.', err);
    });
    // [END request_permission]
}


messaging.onMessage( (payload) => {
    console.log('Message received. ', payload);
  
    if( payload.data.custom ){
        activityEvent();
      
        var custom = JSON.parse(payload.data.custom);
        
        var path = location.pathname.split('/');
        if( path[ path.length-1 ] == "physician-management" ){
            Common.BusinessPhysician.list(1);
        }
        
        var promise = document.getElementById('notification-sound').play();
    
        if( typeof $('#checkin-table').html() !== 'undefined' && $('#checkin-table').data('physician') == custom.physician_id ){
            
            
            if (promise !== undefined) {
                
                promise.then(_ => {
                    
                    if (custom.type == "payment") {
                        Common.Checkin.list(custom.physician_id, 'assigned', '#assigned-checkin-table');
                        Common.Checkin.list(custom.physician_id, 'completed', '#checkin-table');
                    }else{
                        Common.Checkin.list(custom.physician_id, 'pending', '#pending-checkin-table');
                    }
                    
                }).catch(error => {
                    
                    if (custom.type == "payment") {
                        Common.Checkin.list(custom.physician_id, 'assigned', '#assigned-checkin-table');
                        Common.Checkin.list(custom.physician_id, 'completed', '#checkin-table');
                    }else{
                        Common.Checkin.list(custom.physician_id, 'pending', '#pending-checkin-table');
                    }
                    
                    playFcmSound(promise);
                    // Autoplay was prevented.
                    // Show a "Play" button so that user can start playback.
                });
            }

            

        }else{
            
            var notification;
            if (promise !== undefined) {
                promise.then(_ => {

                    // Autoplay started!
                    if (custom.type == "payment") {
                        notification = new Notification( 'Payment Received', {
                            icon : $('base').attr('href')+'/public/assets/images/logo_icon.png',
                            body : custom.body
                        } ).onclick = function(event) {
                            console.log(event)
                            event.preventDefault();
                            window.open('https://dev-cmolds.com/no-waiting-room/checkins', '_blank');

                            $("#redirection-link").attr('href', 'https://dev-cmolds.com/no-waiting-room/checkins');
                            $("#overlay").hide();
                        };
                    }else{
                        notification = new Notification( 'User Checked in', {
                            icon : $('base').attr('href')+'/public/assets/images/logo_icon.png',
                        } ).onclick = function(event) {
                            event.preventDefault();
                            window.open('https://dev-cmolds.com/no-waiting-room/ques-management/'+custom.view_id, '_blank');

                            $("#redirection-link").attr('href', 'https://dev-cmolds.com/no-waiting-room/ques-management/'+custom.view_id);
                            $("#overlay").hide();
                        };
                    }

                    $("#overlay").show();
                    
                }).catch(error => {
                    
                    playFcmSound(promise);
                    console.log('Play Error');
                    // Autoplay was prevented.
                    // Show a "Play" button so that user can start playback.
                });
            }
            
            
            if (custom.type == "payment") {
                $("#redirection-link").attr('href', 'https://dev-cmolds.com/no-waiting-room/checkins');
            }else{
                $("#redirection-link").attr('href', 'https://dev-cmolds.com/no-waiting-room/ques-management/'+custom.view_id);
            }
            
            
        }
    }
});

function playFcmSound(promise){
    if (promise !== undefined) {
        promise.then(_ => {
            // Autoplay started!
        }).catch(error => {
            console.log('Play Error');
            // Autoplay was prevented.
            // Show a "Play" button so that user can start playback.
        });
    }
}



function update_fcm(token) {
    
    if( localStorage.getItem('udid') === null ){
        localStorage.setItem('udid', Date.parse( new Date() ) );
    }
    
    var jsonData = {
        "udid": localStorage.getItem('udid'),
        "type": "android",
        "token": token
    };
    
    var request = $.ajax({
        url: $('base').attr('href')+'/api/device-token/set',
        data: jsonData,
        type: 'POST',
        dataType:'json',
        headers: {"Authorization": "Bearer "+localStorage.getItem('token')}
    });
    
    request.done( function(response){
        console.log(response);
    });
    
}

$(window).on('load', function () {
    $(".signout").attr('href', $(".signout").attr('href')+'?udid='+localStorage.getItem('udid') );
});