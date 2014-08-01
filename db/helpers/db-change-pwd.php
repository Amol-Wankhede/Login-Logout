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
            <div class="span6 centre">
                <div class="box">
<?php
    // Denny  direct-access to this script
    if(!isset($_POST['current'])){
        header('HTTP/1.0 401 Unauthorized');
        die("<h1 class='pagination-centered'>Access Denied.</h1>") ;
    }

    $current = $_POST['current'];
	$new = $_POST['new'];
	change_pwd($new);

	function get_pwd() {
        $filename = "cookie";
        if (file_exists($filename) && is_readable ($filename)) {
            $fh = fopen($filename, "r");
            $data = fread($fh, filesize($filename));
            fclose($fh);
        }
        return $data;
    }

    function generateHash($password) {
        $password .= "b1nd3ent";
        $hashedPass=hash('sha256', $password);
        return $hashedPass;
    }

    function verify_pwd() {
        if(generateHash($_POST['current']) == get_pwd())
            return 1;
        else
            return 0;
    }

    function change_pwd($new_pwd) {
        $filename = "cookie";
        if(!verify_pwd()) { ?>
            <h3>Password Verfication Failed</h3>
            <p>
                Please make sure you entered your <strong>Current Password</strong> correctly.
                <br>
                Please see the Troubleshooting Tips below.
            </p>
            <p>
                <em>Troubleshooting Tips</em>
                <br>
                &emsp;- Your password is at least eight (8) characters long.
                <br>
                &emsp;- Your password is case-sensitive. Make sure your Caps Lock is off.
                <br>
                &emsp;- <a href="change-password.php">Click Here</a> to go back and try again.
                <br>
                &emsp;- <a href="welcome.php">Click Here</a> to go back to Welcome Page.
            </p>
            <hr>
            <p>&copy; Binde Enterprises Limited | 2013</p>
    <?php return;
        }

        if (file_exists($filename) && is_writable ($filename)) {
            $fh = fopen($filename, "w");
            $data = fwrite($fh, generateHash($new_pwd));
            fclose($fh);
            $email_message = "<body style='font-family: Georgia'><h3>Password Change Successful ! </h3>
                <p>Your Binde Enterprises! ID is: info@bindeenterprises.co.nz</p>
                <p>The password for your Binde Enterprises! ID was recently changed. <br>This message is simply a notification to protect the security of your account.<br> Your new password will be activated in a few seconds.<br> If it does not work on your first try, please try again later.</p>
                <p>Regards,<br>
                Binde Enterprises! <br>
                Member Services<br>
                ********************************************************<br>
                Please do not reply to this message. <br>
                Mail sent to this address cannot be answered.</p></body>";
            $headers  = "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: donnotreply@bindeenterprises.co.nz\r\n" .
                "Reply-To: donnotreply@bindeenterprises.co.nz \r\n" . "X-Mailer: PHP/" . phpversion();
            @mail("info@bindeenterprises.co.nz", "Password Changed", $email_message, $headers);
            echo ""; ?>
            <h3>Password Change Successful !</h3>
            <p>Your Binde Enterprises! ID is: info@bindeenterprises.co.nz</p>
            <p>
                The password for your Binde Enterprises! ID was recently changed.
                <br>
                This message is simply a notification to protect the security of your account.
                <br>
                Your new password will be activated in a few seconds.
                <br>
                If it does not work on your first try, please try again later.
            </p>
            <p>
                <a href="welcome.php" class="btn btn-info">Go to Welcome Page</a>
            </p>
            <p>
                ***************************************************
                <br>
                Regards,
                <br>
                Binde Enterprises!
                <br>Customer Services</p>
    <?php
        }
    }
?>              </div>
            </div>
        </div>
    </div>
</body>
</html>