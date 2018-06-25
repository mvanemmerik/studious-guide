<?php
$page_title = 'Request';
include __DIR__.'/includes/header.php';
require __DIR__.'/includes/db.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$myCode = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
$myPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$myPassword2 = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);

if (strlen($myPassword) > 5) {
    if ($myPassword === $myPassword2) {
        $hashed_password = md5($myPassword);

        $sql = "
        UPDATE users
        SET password='$hashed_password', reset_code=''
        WHERE email='$email' AND reset_code='$myCode'
";

        if (mysqli_query($dbc, $sql)) {
            $message = 'Your password was reset.';
            $message .= "<br/><a href='http://php72.test/login.php'>Login<a>";

        //email
            $to = $email;
            $from = 'mvanemmerik@me.com';
            $subject = 'Your password was reset';

        // message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);

        // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

        // Additional headers
            $headers .= "From: Monty<$from>"."\r\n";
          //  $headers .= 'Cc: '.$email2."\r\n";

        // Mail it
            mail($to, $subject, $message, $headers);

            header('Location: login.php');
        } else {
            echo 'Error: <br>' . mysqli_error($dbc);
        }
    } else {
        echo 'Passwords did not match, please try again!';
    }
} else {
    echo 'Passwords need to be at least six characters. Please try again.';
}

mysqli_close($dbc);
include __DIR__.'/includes/footer.html';
