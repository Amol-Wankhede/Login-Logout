<?php session_start();
	define("ORG_NAME", "COMPANY NAME");
	define("ORG_URL", "www.www.com");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Change Password - <?php echo ORG_NAME ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
<body>
	<div class="container">
		<div class="row">
			<div class="span5 centre">
				<div class="box">
					<h4>Change Password</h4>
					<hr>
					<?php
					if(! isset($_SESSION['userId']) ) {
 						header('HTTP/1.0 401 Unauthorized');
        				die("<h3>Access Denied.</h3>") ;
        			} ?>
					<form id="form-data" method="POST" action="helper.change.php">
						<label>Current Password:</label>
						<input type="password" class="input-large" id="current" name="current"  placeholder="Current Password">
						<br>
						<label>New Password:</label>
						<input type="password" class="input-large" id="new" name="new"  placeholder="New Password">
 						<label>Repeat Password:</label>
						<input type="password" class="input-large" id="new2" name="new2"  placeholder="Repeat Password">
						<br>
						<button type="submit" class="btn btn-warning" id="submit" data-loading-text="Changing Password..." > <i class="icon-retweet icon-white"></i>
							Change Password
						</button>
					</form>
					<div class="alert alert-error fade in alert-block" id="alert" style="display:none;">
						<button type="button" class="close">&times;</button>
						<h5>Error Alert !!!</h5>
						<p>
							New Password and Repeat Password <strong>Do not match</strong>
						</p>
					</div>
					<div class="alert alert-error fade in alert-block" id="error" style="display:none;">
						<button type="button" class="close">&times;</button>
							Please choose password with minimum Eight (8) characters.
					</div>
					<hr>
					<p>&copy; <?php echo ORG_NAME ?> | 2013</p>
				</div>
			</div>
		</div>
	</div>
<script src="assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$("#form-data").submit(function(event) {
		$("#alert").hide();
		if( $("#new").val() != $("#new2").val() ) {
			$("#alert").show(300);
			event.preventDefault();
		}
	});

	$("#new").keypress(function(event) {
		$("#error").hide();
		if( $("#new").val().length  < 7)
			$("#error").show();
	});
</script>
</body>
</html>