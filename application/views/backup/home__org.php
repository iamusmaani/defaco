<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Defaco | Scheduling Made Easy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .btn{
      border-radius:0px;
      background: #1983ec;
    }
    body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
    }
    h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
    }
    h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
    }
    .jumbotron {
      background-color: #1580ea;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
    }
    .container-fluid {
      padding: 60px 50px;
    }
    .bg-grey {
      background-color: #f6f6f6;
    }
    .logo-small {
      color: #1580ea;
      font-size: 50px;
    }
    .logo {
      color: #1580ea;
      font-size: 200px;
    }
    .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
    }
    .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
    }
    .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #1580ea;
    }
    .carousel-indicators li {
      border-color: #1580ea;
    }
    .carousel-indicators li.active {
      background-color: #1580ea;
    }
    .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
    }
    .item span {
      font-style: normal;
    }
    .panel {
      border: 1px solid #1580ea;
      border-radius:0 !important;
      transition: box-shadow 0.5s;
    }
    .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }
    .panel-footer .btn:hover {
      border: 1px solid #1580ea;
      background-color: #fff !important;
      color: #1580ea;
    }
    .panel-heading {
      color: #fff !important;
      background-color: #1580ea !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    .panel-footer {
      background-color: white !important;
    }
    .panel-footer h3 {
      font-size: 32px;
    }
    .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
    }
    .panel-footer .btn {
      margin: 15px 0;
      background-color: #1580ea;
      color: #fff;
    }
    .navbar {
      margin-bottom: 0;
      background-color: #1580ea;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
    }
    .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
    }
    .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #1580ea !important;
      background-color: #fff !important;
    }
    .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
    }
    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #1580ea;
    }
    .slideanim {visibility:hidden;}
    .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
    }
    @keyframes slide {
      0% {
      opacity: 0;
      transform: translateY(70%);
      }
      100% {
      opacity: 1;
      transform: translateY(0%);
      }
    }
    @-webkit-keyframes slide {
      0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
      }
      100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
      }
    }
    @media screen and (max-width: 768px) {
      .col-sm-4 {
      text-align: center;
      margin: 25px 0;
      }
      .btn-lg {
      width: 100%;
      margin-bottom: 35px;
      }
    }
    @media screen and (max-width: 480px) {
      .logo {
      font-size: 150px;
      }
    }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Defaco</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">About</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#Sign-up">Sign-up</a></li>
        <li><a href="#contact">Get in Touch</a></li>
        <li><a href="/i-am-interested">I am interest</a></li>
        <li><a href="/members/merchant/signup">Join Us</a></li>
        <li><a href="/members/">Merchant Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Scheduling Made Easy</h1>
  <p>Single app many businesses</p>
</div>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Local Seeker</h2><br>
      <h4>The one and only application to book appointments with local providers of services you need in your every day life!</h4><br>
      <p><strong>Ease of appointments:</strong> BLAH BLAH BLAH</p>
      <p><strong>Ease of payments:</strong> TEST TESTT TEST</p>
      <p><strong>Ease of tracking:</strong> TEST TESTT TEST</p>
      <p><strong>Ease of communication:</strong> TEST TESTT TEST</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Local Providers</h2><br>
      <h4>The one and only application to book appointments with local providers of services you need in your every day life!</h4><br>
      <p><strong>Ease of appointments:</strong> BLAH BLAH BLAH</p>
      <p><strong>Ease of payments:</strong> TEST TESTT TEST</p>
      <p><strong>Ease of tracking:</strong> TEST TESTT TEST</p>
      <p><strong>Ease of communication:</strong> TEST TESTT TEST</p>
    </div>
    </div>
  </div>
</div>

<div id="features" class="container-fluid text-center">
  <h2>FEATURES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-pencil logo-small"></span>
      <h4>Appointments</h4>
      <p>Setting up appointments with your service provider is easier than never before.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-flash logo-small"></span>
      <h4>Instant Quotes</h4>
      <p>Depending on the service you are booking you can get Instant Quotes for the service.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-comment logo-small"></span>
      <h4>Chat System</h4>
      <p>Secured communication without providing your phone number</p>
    </div>
  </div><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-piggy-bank logo-small"></span>
      <h4>Secured Payments</h4>
      <p>Make payments directly with your provider without worry.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>Miltary Grade Security</h4>
      <p>Advanced Encryption Standard or AES is used for your entire session.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-eye-open logo-small"></span>
      <h4 style="color:#303030;">Service Tracking</h4>
      <p>The ability to see seeker or provider traveling to your location.</p>
    </div>
  </div>
</div>

<div id="Sign-up" class="container-fluid">
  <?php 
      if($this->session->flashdata('error')) {
  ?>
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $this->session->flashdata('error');?>.
  </div>
  <?php
      }
  ?>
  <div class="text-center">
    <h2>Choose the right account for you!</h2>
    <h4>To create your free account today please select the correct type of annount you will be needing to create in the Defaco Network.</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>I AM A SEEKER</h1>
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <h4>per month</h4>
          <a href="/landing/register_merchant" class="btn btn-lg">Sign Up</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>I AM A PROVIDER</h1>
        </div>
        <div class="panel-body">
          <p><strong>50</strong> Lorem</p>
          <p><strong>25</strong> Ipsum</p>
          <p><strong>10</strong> Dolor</p>
          <p><strong>5</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$29</h3>
          <h4>per month</h4>
          <a href="/landing/register_merchant" class="btn btn-lg">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">Get in Touch</h2>
  <div class="row">
    <div class="col-sm-7">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Florida, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +XX XXXXXXXXXX</p>
      <p><span class="glyphicon glyphicon-envelope"></span> info@defaco.com</p>
    </div>
    <div class="col-sm-5 slideanim">
      <?php 
          if($this->session->flashdata('success')) {
      ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('success');?>.
      </div>
      <?php
          }
      ?>
      <?php
          if($this->session->flashdata('error')) {
      ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('error');?>.
      </div>
      <?php
          }
      ?>
      <form action="/landing/get_in_touch" method="POST" id="get-in-touch">
        <div class="row">
          <div class="col-sm-12 form-group">
            <input class="form-control" onblur="checkEmpty(this,'Name', 'errorName')" id="name" name="name" placeholder="Full Name" type="text">
            <span id="errorName" class="text-danger"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" onblur="checkEmpty(this,'Phone', 'errorPhone')" id="phone" name="phone" placeholder="Contact Number" type="text">
            <span id="errorPhone" class="text-danger"></span>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" onblur="checkEmpty(this,'Email', 'errorEmail')" id="email" name="email" placeholder="abc@example.com" type="email">
            <span id="errorEmail" class="text-danger"></span>
          </div>
        </div>
        <textarea class="form-control" onblur="checkEmpty(this,'Description', 'errorDescription')" id="description" name="description" placeholder="Feel free to write to us..." rows="5"></textarea>
        <span id="errorDescription" class="text-danger"></span>
        <br>
        <div class="row">
          <div class="col-sm-6 form-group">
            <input type="checkbox" name="callme" id="callme"> I prefer talking on call.<br>
            <span id="errorCallMe" class="text-danger"></span>
          </div>
          <div class="col-sm-6 form-group">
            <button class="btn btn-primary col-xs-12" type="button" onclick="get_in_touch();">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Powered By <a href="https://www.defaco.com" title="Visit Defaco">www.defaco.com</a></p>
</footer>

<script>
$(document).ready(function(){
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
        window.location.hash = hash;
      });
    }
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
});
</script>

<script src="assets/jscripts/helper.js"></script>
<script src="assets/jscripts/front.end.js"></script>
</body>
</html>
