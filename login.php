<?php
$page_title = 'Login';
include 'includes/header.php';

session_start();
//if ($_SESSION["login_user"] != true) {
if (!isset($_SESSION["login_user"])) {
    ?>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <article class='col-lg-8'>

        <div class="heading">
            <h2>Login</h2>
        </div>
        <div class="content">
            <form role="form" method="post" action="login_check.php">
                <div class="form-group">

                    <label for="email">Email: </label>
                    <input type="text" id="email" name ='email' class="form-control" required='required' />

                    <label for="password">Password: </label>
                    <input type="password" id="password" name ='password' class="form-control" required='required' />

                </div>
                <INPUT TYPE="submit" value="Login" class="btn btn-success btn-sm"/>
            </form>
        </div>
    </article>



    </div>
</div>

<?php

} else {
    $me = $_SESSION["login_user"];
    echo "You are already logged in $me.<br/><br/>";
    echo "<a href='index.php' class='btn btn-primary' >Home</a><br/><br/>";
    echo "<a href='logout.php' class='btn btn-primary' >Logout</a>";
}
include('includes/footer.html');
