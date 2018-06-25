<?php
$page_title = 'Request';
include __DIR__.'/includes/header.php';
require('includes/db.php');
echo '<div id="wrapper" class="container-fluid">';

$myIPAdress = $_SERVER['REMOTE_ADDR'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$myPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$myPassword2 = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);
$secret_code = md5(rand());

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid Email!");
    exit();
}

if (strlen($myPassword) > 5) {
    if ($myPassword == $myPassword2) {
        $hashed_password = md5($myPassword);

        $sql = "INSERT INTO users (email, password, reset_code)
VALUES ('$email', '$hashed_password', '$secret_code')";

        if (mysqli_query($dbc, $sql)) {
            echo "Thanks for registering. An activation link will be sent to $email.";
            $message = "Thanks for registering.";
            $message = $message."<br/><a href='http://php72.test/activation.php?code=$secret_code&email=$email'>Activate Account</a>";

        //email
        $to = "$email";
            $email2 = 'mvanemmerik@me.com';

            $from = 'vanemmerik.monty@gmail.com';
            $subject = 'Thanks for registering, activation required';

        // message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);

        // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

        // Additional headers
            $headers .= "From: Monty<$from>"."\r\n";
            $headers .= 'Bcc: '.$email2."\r\n";

        // Mail it
            mail($to, $subject, $message, $headers);

            //header('Location: pto_login.php');
        } else {
            echo "Error: <br>" . mysqli_error($dbc);
        }
    } else {
        echo "Passwords did not match, please try again!";
    }
} else {
    echo "Passwords need to be at least six characters. Please try again.";
}

mysqli_close($dbc);
echo '</div>';
include('includes/footer.html');
