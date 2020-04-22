<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Defaco | <?php echo $title;?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(assets/media/bg/bg-2.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="assets/media/logos/logo-5.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Admin Login</h3>
								</div>
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
									}
								?>
								<form class="kt-form" id="admin-login-form" action="index.php/administration/admin/process_login" method="POST">
									<div class="input-group">
										<input class="form-control" type="text" onblur="checkEmpty(this,'Email', 'errorEmail')" name="email" id="email" placeholder="Email">
									</div>
									<div id="errorEmail" class="text-danger"></div>
									<div class="input-group">
										<input class="form-control" type="password" onblur="checkEmpty(this,'Password', 'errorPassword')" name="password" id="password" placeholder="Password">
									</div>
									<div id="errorPassword" class="text-danger"></div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<a href="index.php/administration/admin/forget_password" class="kt-login__link">Forget Password ?</a>
										</div>
										<div class="col kt-align-right">
											<span style="cursor:pointer;" onclick="process_login()" class="btn btn-brand btn-pill">Log Me In</span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<?php $this->load->view('admin/components/common_scripts');?>
	</body>
</html>