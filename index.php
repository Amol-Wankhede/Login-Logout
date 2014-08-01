<?php
	session_start();
 	if(isset($_SESSION['userId']) ) {
	    unset($_SESSION['userId']);
	}
	define("ORG_NAME", "COMPANY NAME");
	define("ORG_URL", "www.www.com");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page - <?php echo ORG_NAME ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span5 centre">
				<div class="box">
					<h4>Login</h4>
					<hr>
					<form id="form-data" method="POST" action="helper.check.php">
						<label>Enter Username</label>
						<input type="text" class="input-large span3" placeholder="Email" id="username" name="username">
						<label>Enter Password</label>
						<input type="password" class="input-large span3" placeholder="Password" id="password" name="password">
 						<button type="submit" class="btn btn-primary" id="submit" data-loading-text="Logging..." > <i class="icon-user icon-white"></i>
							Login
						</button>
 						<a href="forgot.php" class="btn btn-warning" style="margin: 10px 0 0 10px">
							<i class="icon-wrench icon-white"></i> Forgot Password
						</a>
					</form>
					<div class="alert alert-error fade in alert-block" id="alert" style="display:none;">
						<button type="button" class="close">&times;</button>
						<h4>Authentication Failed !!!</h4>
						<p>
							Please make sure you enter your email address and password correctly.
							<br>
							If you still can't log in, please see the Troubleshooting Tips below.
						</p>
						<p>
							<em>Troubleshooting Tips</em>
							<br>
							&emsp;- Please enter email address which is registered with us.
							<br>
							&emsp;- Your password is at least eight (8) characters long.
							<br>
							&emsp;- Your password is case-sensitive. Make sure your Caps Lock is off.
							<br>
							&emsp;- You can reset your password by clicking Forgot Password.
						</p>
					</div>
					<hr>
					<p>&copy; <?php echo ORG_NAME ?> | 2013</p>
				</div>
			</div>
		</div>
	</div>

<script src="assets/js/jquery-1.7.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$("#submit")
    .ajaxStart(function() {
        $(this).button('loading')
    })
    .ajaxStop(function() {
        $(this).button('reset')
    });
$('.close').live('click', function(event) {
    $("#alert").hide(300);
});
$("#submit").click(function(event) {
    $("#alert").hide();
    event.preventDefault();
    $.ajax({
        url: 'helper.check.php',
        type: 'POST',
        dataType: 'json',
        data: $("#form-data").serializeArray(),
        complete: function(xhr, textStatus) {
            // console.log("//called when complete");
        },
        success: function(data, textStatus, xhr) {
            // console.log(data);
            if (data == "Error") {
                $("#alert").show(300);
                // $('#alert').show(0).delay(5000).hide(0);
            } else {
                location.href = 'welcome.php';
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("//called when there is an error");
        }
    });
});
</script>
</body>
</html>