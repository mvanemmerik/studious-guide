<?php
$page_title = 'Request';
include('includes/header.html');
require('includes/db.php');

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$myCode = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

$query = "
UPDATE users
SET active=1, reset_code=''
WHERE email='$email' AND reset_code='$myCode'
";

mysqli_query($dbc, $query);
$rowCount = mysqli_affected_rows($dbc);
if ($rowCount > 0) {
    echo "Your account is now active!<br/><br/>";
    echo "<a href='login.php' class='btn btn-primary' >Log In</a><br/><br/>";
} else {
    echo "Invalid or expired activation code.";
}

mysqli_close($dbc);
include('includes/footer.html');
