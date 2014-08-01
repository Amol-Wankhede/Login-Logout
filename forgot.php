<?php
	define("ORG_NAME", "COMPANY NAME");
	define("ORG_URL", "www.www.com");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forgot Password - <?php echo ORG_NAME ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
<body>
	<div class="container">
		<div class="row">
			<div class="span5 centre">
				<div class="box">
					<h4>Forgot Password</h4>
					<hr>
					<form id="form-data" method="POST" action="helper.forgot.php">
						<label>Registered Email ID</label>
						<input type="text" class="input-large" placeholder="Email" id="username" name="username" autocomplete="off">
						<button type="submit" class="btn btn-warning" id="submit" data-loading-text="Reseting Password..." > <i class="icon-wrench icon-white"></i>
							Reset Password
						</button>
					</form>
					<hr>
					<p>&copy; <?php echo ORG_NAME ?> | 2013</p>
				</div>
			</div>
		</div>
	</div>
<script src="assets/js/jquery-1.7.2.min.js"></script>
</body>
</html>