<?php

$page_title = 'Home';
include 'includes/header.php';
if (!isset($_SESSION["login_user"])) {
?>

<div id="wrapper" class='col-md-4'>
  <article>
    <div class="heading">
      <h2>Register</h2>
    </div>
    <div class="content">
      <form role="form" method="post" action="register_insert.php">
        <div class="form-group">
          <label for="email">Email: </label>
          <input type="text" id="email_2" name ='email' class="form-control" required='required' />

          <label for="password">Password: </label>
          <input type="password" id="password_2" name ='password' class="form-control" required='required' />

          <label for="password_confirm">Password Again: </label>
          <input type="password" id="password_confirm" name ='password_confirm' class="form-control" oninput="check(this)" required='required' />
                
          <script language='javascript' type='text/javascript'>
            function check(input) {
              if (input.value != document.getElementById('password_2').value) {
                input.setCustomValidity('Passwords do not match.');
              } else {
                input.setCustomValidity('');
              }
            }
          </script>
        </div>
        <INPUT TYPE="submit" value="Register" class="btn btn-success btn-sm"/>
      </form>
    </div>
  </article>
</div>

<?php
} else {
    
    ?>

<div id="wrapper" class='col-md-4'>
  <article>    
    You are already registered and logged in.
  </article>
</div>

<?php

}
include('includes/footer.html');
