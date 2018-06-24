<?php 
require("vendor/autoload.php");
$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();


// Make the connection:
$dbc = @mysqli_connect ($_ENV['MYDB_HOST'], $_ENV['MYDB_USER'], $_ENV['MYDB_PASSWORD'], $_ENV['MYDB_NAME']) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
