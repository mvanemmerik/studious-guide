<?php 
session_start();
$title = 'Monty van Emmerik';
if (isset($_SESSION["login_user"])) {
  $title = $_SESSION["login_user"];
}
?>
  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/global.css">
    <title><?php echo $page_title; ?></title>
  </head>
	<body>
		<div>
        <div id='header'>
            
            <?php
            echo "<h1 id='main_header'>$title</h1>";
            if (isset($_SESSION["login_user"])) {
              echo "<a href='logout.php' class='btn btn-primary btn-sm mod_date' >Log Out</a><br/><br/>";
            }
            ?>
          </div>
          <div class="container-fluid">
