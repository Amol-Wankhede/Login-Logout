<?php
	session_start();
	define("ORG_NAME", "COMPANY NAME");
	define("ORG_URL", "www.www.com");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome - <?php echo ORG_NAME ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
<body>
	<div class="container">
		<div class="row">
			<div class="span8 centre">
				<div class="box">
					<?php  	if(isset($_SESSION['userId']) ) { ?>
					<h3>You've been successfully logged in !!!</h3>
					<hr>
					<h4>Manage Pages</h4>
					<ul class="unstyled">
						<li>
							<a href="../editor/edit-home.php" target="_blank"> &#187; Home</a>
						</li>
						<li>
							<a href="../editor/edit-openings.php" target="_blank"> &#187; Openings</a>
						</li>
						<li>
							<a href="../editor/edit-jobs.php" target="_blank"> &#187; Job Sector</a>
						</li>
						<li>
							<a href="../editor/edit-about.php" target="_blank"> &#187; About</a>
						</li>
						<li>
							<a href="../editor/edit-contact.php" target="_blank"> &#187; Contact</a>
						</li>
						<li>
							<a href="../editor/edit-sidebar.php" target="_blank"> &#187; Sidebar Data</a>
						</li>
						<li>
							<a href="../editor/edit-images.php" target="_blank"> &#187; Manage Slideshow Images</a>
						</li>
					</ul>
					<hr>
					<h4>Manage Password</h4>
					<a href="change-password.php">Click Here to Change Password</a>

					<?php } else {
 				header('Location: index.php');
			} ?>
					<hr>
					<p>&copy; <?php echo ORG_NAME ?> | 2013</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>