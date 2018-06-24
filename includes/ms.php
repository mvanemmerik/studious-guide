<?php
require("vendor/autoload.php");
$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$connectionInfo = array( "UID"=>$_ENV['DB_USER'],
                         "PWD"=>$_ENV['DB_PASSWORD'],
                         "Database"=>$_ENV['DB_NAME']);
                         
$conn = @sqlsrv_connect($_ENV['DB_HOST'], $connectionInfo);
if($conn === false )
{
     echo "Could not connect. Windows Server VM may be offline.\n";
     die();
}

?>
