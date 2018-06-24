<?php
$page_title = 'Password Reset';
include('includes/header.html');
require('includes/db.php');

//$myid = $_GET['myid'];
$mycode = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

$query = "select email from users WHERE reset_code = '$mycode'";

$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);

echo "<h1>Password Reset</h1>\n";

if ($rowCount > 0) {
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        print<<<_HTML_

        <article>

        <div class="heading">
            <h2>Reset Password</h2>
        </div>
        <div class="content">
            <form role="form" method="post" action="update_password.php">
                <div class="form-group">
                    <input type="hidden" name="email" value="$row[email]">
                    <input type="hidden" name="code" value="$mycode">

                    <label for="password">Password: </label>
                    <input type="password" id="password" name ='password' class="form-control" required='required' />

                    <label for="password_confirm">Password Again: </label>
                    <input type="password" id="password_confirm" name ='password_confirm' class="form-control" required='required' />

                </div>
                <INPUT TYPE="submit" value="Update Password" class="btn btn-success btn-sm"/>
            </form>
        </div>
    </article>

_HTML_;
    }
} else {
    echo "Email not found or invalid code.";
}
mysqli_close($dbc);
include('includes/footer.html');
