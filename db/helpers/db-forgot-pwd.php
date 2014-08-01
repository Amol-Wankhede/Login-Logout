<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot Password - Binde Enterprises Limited </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
<body>
    <div class="container">
        <div class="row">
            <div class="span7 centre">
                <div class="box">
<?php
    // Denny  direct-access to this script
    if(!isset($_POST['username'])){
        header('HTTP/1.0 401 Unauthorized');
        die("<h1 class='pagination-centered'>Access Denied.</h1>") ;
    }

	$user = trim($_POST['username']);
	set_pwd($user);

    function generateHash($password) {
        $password .= "b1nd3ent";
        $hashedPass=hash('sha256', $password);
        return $hashedPass;
    }

    function set_pwd($user) {
        $filename = "cookie";
        if(strcmp($user, "info@bindeenterprises.co.nz")) { ?>
    <!--     	echo "<h3> Authentication failed </h3>"; -->
            <h3>Email Verfication Failed</h3>
            <p>
                Please make sure you entered your <strong>Registered Email Address</strong> correctly.
                <br>
                Please see the Troubleshooting Tips below.
            </p>
            <p>
                <em>Troubleshooting Tips</em>
                <br>
                &emsp;- Your email is registered with us.
                <br>
                &emsp;- Do not enter any other email address.
                <br>
                &emsp;- Please check the spellings of email address.
                <br>
                &emsp;- <a href="forgot.php">Click Here</a> to go back and try again.
                <br>
                &emsp;- <a href="index.php">Click Here</a> to go back to Login Page.
            </p>
            <hr>
            <p>&copy; Binde Enterprises Limited | 2013</p>
    <?php return;
        }

        $new_pwd = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()"), 0, 12);
        if (file_exists($filename) && is_writable ($filename)) {
            $fh = fopen($filename, "w");
            $data = fwrite($fh, generateHash($new_pwd));
            fclose($fh);
            $email_message = "<body style='font-family: Georgia'><h3>Password Reset Successful ! </h3><p>Your Binde Enterprises! ID is: info@bindeenterprises.co.nz</p>
                <p>The password for your Binde Enterprises! ID has been reset.<br> This message is simply a notification to protect the security of your account. <br>Your new password will be activated in a few seconds.<br> If it does not work on your first try, please try again later.</p>
                <p>Details are as follows - <br>
                    &emsp;&emsp;Username: <strong>info@bindeenterprises.co.nz</strong><br>
                    &emsp;&emsp;Password: <strong>$new_pwd</strong></p>
                <p>All you have to do is login to your account with this password. <br>
                And set a new account password.</p>
                <p>Regards,<br>
                Binde Enterprises! <br>
                Customer Services<br>
                ********************************************************<br>
                Please do not reply to this message. <br>
                Mail sent to this address cannot be answered.</p></body>";
            $headers  = "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: donnotreply@bindeenterprises.co.nz\r\n" .
                "Reply-To: donnotreply@bindeenterprises.co.nz \r\n" . "X-Mailer: PHP/" . phpversion();
            @mail("info@bindeenterprises.co.nz", "Password Reset - Binde Enterprises", $email_message, $headers);  ?>
            <h3>Password Reset Successful !</h3>
            <p>Your Binde Enterprises! ID is: info@bindeenterprises.co.nz</p>
            <p>
                The password for your Binde Enterprises! ID has been reset.
                <br>
                This message is simply a notification to protect the security of your account.
                <br>
                Your new password will be activated in a few seconds.
                <br>
                If it does not work on your first try, please try again later.
            </p>
            <p>
                All you have to do is login to your check your email account.
                <br>
                Email subject: <em>Password Reset - Binde Enterprises.</em>
                <br>Please check for email in your spam folder too.</p>
            <p>
                <a href="index.php" class="btn btn-success">Click here to Login</a>
            </p>
            <p>
                ********************************************************
                <br>
                Regards,
                <br>
                Binde Enterprises!
                <br>Customer Services</p>
    <?php    }
    }
    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>