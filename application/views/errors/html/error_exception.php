<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="../../../">
		<meta charset="utf-8" />
		<title>Defaco | 404</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="assets/css/pages/error/error-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1" style="background-image: url(assets/media/error/bg1.jpg);">
				<div class="kt-error-v1__container">
					<h1 class="kt-error-v1__number">An uncaught Exception was encountered</h1>
					<p class="kt-error-v1__desc">>Type: <?php echo get_class($exception); ?></p>
					<p class="kt-error-v1__desc">Type: <?php echo get_class($exception); ?></p>
					<p class="kt-error-v1__desc">Message: <?php echo $message; ?></p>
					<p class="kt-error-v1__desc">Filename: <?php echo $exception->getFile(); ?></p>
					<p class="kt-error-v1__desc">Line Number: <?php echo $exception->getLine(); ?></p>
				</div>
				<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
					<p>Backtrace:</p>
					<?php foreach ($exception->getTrace() as $error): ?>
						<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
							<p class="kt-error-v1__desc">
							File: <?php echo $error['file']; ?><br />
							Line: <?php echo $error['line']; ?><br />
							Function: <?php echo $error['function']; ?>
							</p>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>
		<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
	</body>
</html>