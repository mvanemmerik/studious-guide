<?php 
require("vendor/autoload.php");
$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// open a connection to the database server
$connection = pg_connect ("host=$_ENV[PGDB_HOST] dbname=$_ENV[PGDB_NAME] user=$_ENV[PGDB_USER] password=$_ENV[PGDB_PASSWORD]");
if (!$connection)
{
die("Could not open connection to database server");
}
