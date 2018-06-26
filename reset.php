<?php

$page_title = 'Home';
include 'includes/header.php';
if (!isset($_SESSION["login_user"])) {
?>

<div id="wrapper" class='col-md-4'>
  <article>
    <div class="heading">
      <h2>Password Reset</h2>
    </div>
    <div class="content">
      <form role="form" method="post" action="password_reset.php">
        <div class="form-group">
          <label for="email">Email: </label>
          <input type="text" id="email_3" name ='email' class="form-control" required='required' />
        </div>
        <INPUT TYPE="submit" value="Reset Password" class="btn btn-success btn-sm"/>
      </form>
    </div>
  </article>
</div>

<?php
} else {
    
    ?>
<div id="wrapper" class='col-md-4'>
  <article>    
    Please log out to reset password.
  </article>
</div>

<?php

}

include('includes/footer.html');
