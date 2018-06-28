<?php
$page_title = 'Request';
include 'includes/header.php';
require('includes/db.php');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$myPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$hashed_password = md5($myPassword);

//$myid = $_GET['myid'];
$myid = filter_input(INPUT_GET, 'myid', FILTER_VALIDATE_INT);

$query = "
SELECT * from users WHERE email = '$email' and password = '$hashed_password'
AND active = 1
";

$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);


echo "<h2>Login</h2>\n";

if ($rowCount > 0) {
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        $_SESSION['login_user']="$email";
        header('Location: index.php');
    }
} else {
  echo '<div id="pto-button-wrap" class="clearfix">';

    echo "<p>Login Failed. Please try again.</p>";
    echo '</div>';
}
mysqli_close($dbc);
include('includes/footer.html');
