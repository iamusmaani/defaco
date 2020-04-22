<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Defaco | I am Interested</title>

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
        <li><a href="/">Back to Home</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container (Contact Section) -->
<div class="container-fluid bg-grey">
  <form id="record-interest" action="landing/record_interest" method="POST">
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
  
  
  
  <div class="row">
      
      
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
      <h4 class="text-center">Register with us to get, latest updates from Defaco</h4>
      <img src="assets/media/app/scheduler.png" width="50%" class="img img-responsive"><br><br>
      <p class="text-justify">Are you a provider of a service you would like to include in our network? Please fill out the form to get in touch with someone in our sales team to help set you up with the perfect account.</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background:#fff;">
        <div class="row">
            <h4 class="text-center">Show your interest</h4>
        </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <p class="text-danger">Fields marked with (*) are mandatory</p>
            <label>First Name: <b class="text-danger">*</b></label>
            <input class="form-control" onblur="checkEmpty(this,'First Name', 'errorFirstName')" id="first_name" name="first_name" placeholder="First name is mandatory" type="text">
            <span id="errorFirstName" class="text-danger"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <label>Last Name: <b class="text-danger">*</b></label>
            <input class="form-control" onblur="checkEmpty(this,'Last Name', 'errorLastName')" id="last_name" name="last_name" placeholder="Last name is mandatory" type="text">
            <span id="errorLastName" class="text-danger"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <label>Company Name:</label>
            <input class="form-control" id="company" name="company" placeholder="Enter your company name" type="text">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <label>Email: <b class="text-danger">*</b></label>
            <input class="form-control" onblur="checkEmpty(this,'Email', 'errorEmail')" id="email" name="email" placeholder="Email is mandatory" type="text">
            <span id="errorEmail" class="text-danger"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <label>Phone: <b class="text-danger">*</b></label>
            <input class="form-control" onblur="checkEmpty(this,'Phone', 'errorPhone')" id="phone" name="phone" placeholder="Phone is mandatory" type="text">
            <span id="errorPhone" class="text-danger"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group text-left">
            <input id="terms" name="terms" type="checkbox"> I accept terms & conditions <b class="text-danger">*</b><br>
            <span id="errorTerms" class="text-danger"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-primary pull-right col-xs-12" type="button" onclick="validate_interest();">Register Me!</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Image of location/map -->
<img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Powered By <a href="https://www.defaco.com" title="Visit Defaco">www.defaco.com</a></p>
  <p>Wanna read our terms? <a href="/terms" title="Terms">Click Here</a></p>
</footer>

<!--Custom Scripts-->
<script src="assets/jscripts/helper.js"></script>
<script src="assets/jscripts/front.end.js"></script>
</body>
</html>
