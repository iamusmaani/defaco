<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Defaco | <?php echo $title;?></title>
		<meta name="description" content="Defaco Merchant Login">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
					<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(assets/media/app/merchant_signup.jpeg);">
						<div class="kt-grid__item">
							<a href="/" class="kt-login__logo">
                                <img alt="Logo" src="assets/media/logos/03.png" width="50"/><logo style='font-size:30px; color:#fff;'>efaco</logo>
							</a>
						</div>
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
							<div class="kt-grid__item kt-grid__item--middle">
								<h3 class="kt-login__title">Join Defaco!</h3>
								<h4 class="kt-login__subtitle">With defaco see your business touch the skies. Scheduling was never relaxing before.</h4>
							</div>
						</div>
						<div class="kt-grid__item">
							<div class="kt-login__info">
								<div class="kt-login__copyright">
									&copy 2018 Defaco
								</div>
								<div class="kt-login__menu">
                                    <a href="/members/merchant/signup" class="kt-link">Sign Up</a>
                                    <a href="/members" class="kt-link">Login</a>    
                                    <a href="/#features" class="kt-link">Features</a>
									<a href="/#pricing" class="kt-link">Pricing</a>
									<a href="/#contact" class="kt-link">Help</a>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
						<div class="kt-login__body">
							<div class="kt-login__form">
                                <?php
                                    if($this->session->flashdata('success')) {
                                ?>
                                <div class="alert alert-solid-success alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                    <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                    <div class="alert-text">
                                    <?php echo $this->session->flashdata('success');?><br>
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($this->session->flashdata('error')) {
                                ?>
                                <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                    <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                    <div class="alert-text">
                                    <?php print_r($this->session->flashdata('error'))?><br>
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <h4>Join Defaco</h4>
                                <p>We dont need much of your information.</p>
								<form action="members/merchant/process_signup" id="merchant-signup" method="POST">
									<div class="form-group">
                                        <input class="form-control" type="text" onblur="checkEmpty(this,'First Name', 'errorFName')" placeholder="First Name" name="first_name">
                                        <span id="errorFName" class="text-danger"></span>
									</div>
									<div class="form-group">
                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Last Name', 'errorLName')" placeholder="Last Name" name="last_name">
                                        <span id="errorLName" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" onblur="checkEmpty(this,'Email', 'errorEmail')" placeholder="Email" name="email">
                                        <span id="errorEmail" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Phone', 'errorPhone')" placeholder="Phone" name="phone">
                                        <span id="errorPhone" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" onblur="checkEmpty(this,'Business Name', 'errorBusiness')" placeholder="Business Name" name="company_name">
                                        <span id="errorBusiness" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" onblur="checkEmpty(this,'Password', 'errorPassword')" placeholder="Choose Password" name="password">
                                        <span id="errorPassword" class="text-danger"></span>
									</div>
									<div class="form-group">
                                        <br>
                                        <input type="checkbox" name="terms"> I Accept 
                                        <a href="/members/merchant/terms_conditions" class="kt-link kt-login__link-forgot">Terms & Conditions</a>
										<button type="button" onclick="process_signup()" class="btn btn-primary pull-right">Join Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <?php $this->load->view('merchants/components/common_scripts');?>
	</body>
</html>