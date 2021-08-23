  <!-- style -->
  <link rel="stylesheet" href="{{ url('libs/font-awesome/css/font-awesome.min.css') }} " type="text/css" />

  <!-- build:css ../assets/css/app.min.css -->
  <link rel="stylesheet" href="{{ url('libs/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ url('assets/css/app.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css" />


  <style>

    .profile-img-border{
      border: 2px solid #45add7;
      border-radius: 15px;
      padding: 15px;
    }

    /*.modal-header button{
      position: absolute;
      right: -18px;
      top: -19px;
      background-color: black !important;
      border-radius: 60px;
      color: white !important;
      width: 34px
    }*/

    .modal-header h6{
      text-align: center;
      width: 100%;
      color: #4c4c4c;
    }

    .modal-header{
      background: #eff3ff;
    }

    .sidebar li:hover, .sidebar li:focus {
      /*background: #dc5de0;*/
      color: white;
      background-image: linear-gradient(45deg, #423ef9, #04c4fd5c);
    }

    .sidebar .active {
      color: white;
      background-image: linear-gradient(45deg, #423ef9, #04c4fd5c);
    }

    .sidebar .active a{
      color: white !important;
    }

    .sidebar li:hover i, .sidebar li:focus i {
      color: white;
    }

    .scroll_y_500 {
      max-height: 500px;overflow-y: scroll;
    }
    .viewed{
      background:#eaeaea;
    }
    .app-user{
      padding: 3px 10px;
      border-radius: 50px;
      font-size: 17px;
    }
    .manual-user{
      padding: 3px 7px;
      border-radius: 50px;
      font-size: 17px;
    }
    .app-user i{
      transform: rotate(-45deg);
    }
    .completed-item {
      background: #20ab6857;
    }
    .completed-item .time, .assigned-item .time, .checkin-item .time {
      background: white;
      color: black;
      padding: 5px;
      border-radius: 5px;
    }
    .assigned-item .time {
      background: #f38d8d;
      color: white;
    }

    .checkin-item .time {
      background: #5ebf8e;
      color: white;
    }

    #overlay {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      /*background-color: rgba(0,0,0,0.5);*/
      background-color: #000000ab;
      z-index: 9999;
      /*cursor: pointer;*/
    }

    #overlay-content{
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 20px;
      color: white;
      transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
    }

    .notification-gif{
        background-image: url(http://localhost/no-waiting-room/public/assets/images/animation-notification-3.gif);
        width: 40px;
        height: 40px;
        background-repeat: no-repeat;
        background-size: 40px auto;
        background-position: center;
    }

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prevSlider, .nextSlider {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white !important;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background-color: #1e4966ad;
}

/* Position the "nextSldier button" to the right */
.nextSlider {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prevSlider:hover, .nextSlider:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  /*background-color: #717171;*/
}

/* Fading animation */
/*.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
*/

body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 100%;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

/*.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}*/

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

  </style>
