<?php

$page_title = 'Home';
include 'includes/header.php';
if (!isset($_SESSION["login_user"])) {
    header("Location: login.php"); /* Redirect browser */
    exit();

} else {
    
    ?>
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

<?php

}


include('includes/footer.html');
