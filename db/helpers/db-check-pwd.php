<?php
    session_start(); 
    // Denny  direct-access to this script
    if(!isset($_POST['username'])){
        header('HTTP/1.0 401 Unauthorized');
        die("<h1 class='pagination-centered'>Access Denied.</h1>") ;
    }

    $username = trim($_POST['username']);
    if(generateHash($_POST['password']) == get_pwd() 
                        && strcasecmp($username, "info@bindeenterprises.co.nz") == 0) {
        echo json_encode("Good");
        session_save_path('../');
        ini_set('session.gc_maxlifetime', 3*60*60); // 3 hours
        ini_set('session.gc_probability', 1);
        ini_set('session.gc_divisor', 100);
        ini_set('session.cookie_secure', FALSE);
        ini_set('session.use_only_cookies', TRUE);
        $_SESSION['userId'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()"), 0, 12);
    }
    else 
        echo json_encode("Error");

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