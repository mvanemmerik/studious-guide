<?php

$page_title = 'Home';
include 'includes/header.php';

session_start();
//if ($_SESSION["login_user"] != true) {
if (!isset($_SESSION["login_user"])) {

?>

<div id='header'>
  <h1 id='main_header'>Monty van Emmerik</h1>
  <p class="mod_date"><?php echo "Last modified: " . date ("F d, Y", getlastmod()); ?></p>
</div>

<div id="wrapper" class="container-fluid">

        <article>

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
    <article>

    <div class="heading">
        <h2>Register</h2>
    </div>
    <div class="content">
        <form role="form" method="post" action="register_insert.php">
            <div class="form-group">

                <label for="email">Email: </label>
                <input type="text" id="email" name ='email' class="form-control" required='required' />

                <label for="password">Password: </label>
                <input type="password" id="password" name ='password' class="form-control" required='required' />

                <label for="password_confirm">Password Again: </label>
                <input type="password" id="password_confirm" name ='password_confirm' class="form-control" required='required' />


            </div>
            <INPUT TYPE="submit" value="Register" class="btn btn-success btn-sm"/>
        </form>
    </div>
</article>
<article>

<div class="heading">
    <h2>Password Reset</h2>
</div>
<div class="content">
    <form role="form" method="post" action="password_reset.php">
        <div class="form-group">

            <label for="email">Email: </label>
            <input type="text" id="email" name ='email' class="form-control" required='required' />

        </div>
        <INPUT TYPE="submit" value="Reset Password" class="btn btn-success btn-sm"/>
    </form>
</div>
</article>



    </div>
</div>

<?php
} else {
    $me = $_SESSION["login_user"];
    echo("Welcome: $me!<br/><br/>");

    ?>

    <div id='header'>
      <a href='logout.php' class="btn btn-primary btn-sm mod_date" >Log Out</a>
    </div>

    <div id="wrapper" class="container-fluid">
    <a class="btn btn-primary btn-lg" href="mysql.php" role="button">MySQL</a>
    <a class="btn btn-secondary btn-lg" href="ms.php" role="button">Microsoft SQL</a>
    <a class="btn btn-success btn-lg" href="pg.php" role="button">PostgreSQL</a>
    <a class="btn btn-danger btn-lg" href="mysql.php" role="button">MySQL</a>
    <a class="btn btn-warning btn-lg" href="ms.php" role="button">Microsoft SQL</a>
    <a class="btn btn-info btn-lg" href="pg.php" role="button">PostgreSQL</a>
    <a class="btn btn-light btn-lg" href="mysql.php" role="button">MySQL</a>
    <a class="btn btn-dark btn-lg" href="ms.php" role="button">Microsoft SQL</a>

    </div>
  </div>

<?php

}


include('includes/footer.html');
