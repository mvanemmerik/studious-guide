<?php 
session_start();
$title = "Monty's Sandbox";
if (isset($_SESSION["login_user"])) {
  $title = $_SESSION["login_user"];
}
?>
  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/global.css">
    <title><?php echo $page_title; ?></title>
    
    <script type="text/javascript">
      function delete_id(id)  {
        if(confirm('Are you sure you want to delete this request?'))
          {
            window.location.href='delete.php?myid='+id;
          }
      }
    </script>

  </head>
	<body>
    <div id='header'>
      <?php
      echo "<h1 id='main_header' class='center'>$title</h1>";
      echo "<div class='right'>";
      if (isset($_SESSION["login_user"])) {
        echo "<a href='index.php' class='btn btn-primary btn-sm' >Home</a>";
        echo "<a href='logout.php' class='btn btn-primary btn-sm' >Log Out</a>";
      } else {
        echo "<a href='login.php' class='btn btn-primary btn-sm' >Log In</a>";
        echo "<a href='register.php' class='btn btn-primary btn-sm' >Register</a>";
        echo "<a href='reset.php' class='btn btn-primary btn-sm' >Reset Password</a>";
      }
        ?>
        </div> 
    </div>
    <div class="container-fluid">
