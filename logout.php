<?php
	session_start();
	unset($_SESSION['userId']);
	define("ORG_NAME", "COMPANY NAME");
	define("ORG_URL", "www.www.com");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Logout Page - <?php echo ORG_NAME ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
<body>
	<div class="container">
		<div class="row">
			<div class="span6 centre">
				<div class="box">
					<h4>You've been successfully Logged out !</h4>
					<hr>
					<p class="text-center">
						<a href="http://www.bindeenterprises.co.nz" >Click Here to Visit Site</a>
					</p>
					<hr>
					<p>&copy; <?php echo ORG_NAME ?> | 2013</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>