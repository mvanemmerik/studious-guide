<?php
$page_title = 'Login';
include 'includes/header.php';

//if ($_SESSION["login_user"] != true) {
if (!isset($_SESSION["login_user"])) {
    ?>
<div id="wrapper" class='col-md-4'>
    <article>
        <div class="heading">
            <h2>Login</h2>
        </div>
        <div class="content">
            <form role="form" method="post" action="login_check.php">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" id="email_1" name ='email' class="form-control" required='required' />

                    <label for="password">Password: </label>
                    <input type="password" id="password_1" name ='password' class="form-control" required='required' />
                </div>
                <INPUT TYPE="submit" value="Login" class="btn btn-success btn-sm"/>
            </form>
        </div>
    </article>
</div>

<?php

} else {
    $me = $_SESSION["login_user"];
    echo "You are already logged in $me.<br/><br/>";
}
include('includes/footer.html');
