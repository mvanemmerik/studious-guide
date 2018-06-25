<?php
$page_title = 'Password Request';
include __DIR__.'/includes/header.php';
require('includes/db.php');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//$hashed_password = md5($myPassword);

$query = "
SELECT * from users WHERE email = '$email'
";

$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);


echo "<h1>Password Reset</h1>\n";

if ($rowCount > 0) {
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        echo "If a valid email address was found, a reset link will be sent!";
        $secret_code = md5(rand());

        ////
        $sql = "
        UPDATE users
        SET reset_code='$secret_code'
        WHERE email='$email'
        ";


        if (mysqli_query($dbc, $sql)) {
            $message = "If you requested to reset your password for the PTO site please click the link below.";
            $message = $message."<br/><a href='http://php72.test/reset_my_password.php?code=$secret_code'>Reset Password</a>";

        //email
        $to = "$email";
        //$email2 = 'mvanemmeri@gannett.com';

            $from = 'mvanemmerik@me.com';
            $subject = 'Password Reset';

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
        }
    }
} else {
    echo "If a valid email address was found, a reset link will be sent.";
}

mysqli_close($dbc);
include('includes/footer.html');
