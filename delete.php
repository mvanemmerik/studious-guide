<?php

$page_title = 'Delete Name';
include('includes/header.php');
require('includes/db.php');


if (!isset($_SESSION["login_user"])) {
    echo("Access denied!");
    exit();
}


$myid = filter_input(INPUT_GET, 'myid', FILTER_VALIDATE_INT);

$query = "select * from names WHERE id = $myid";
$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	$first = $row["first"];
	$last = $row["last"];
}


$sql = "DELETE FROM names WHERE id=$myid";
echo "<h1>Name Deleted</h1>\n";

if (mysqli_query($dbc, $sql)) {
    echo "$first $last with id: $myid was deleted.";
    echo '<a class="btn btn-primary btn-sm" href="mysql.php" role="button">Names</a>';
} else {
    echo "Name was not deleted.";
}

mysqli_close($dbc);
include('includes/footer.html');
