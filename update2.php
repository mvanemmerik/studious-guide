<?php
$page_title = 'Updated Name';
include('includes/header.php');
require('includes/db.php');

$myid = filter_input(INPUT_POST, 'myid', FILTER_VALIDATE_INT);
$first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
$last = filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING);
$message;

$sql = "UPDATE names SET first='$first', last='$last' WHERE id=$myid";


if (mysqli_query($dbc, $sql)) {
    echo "$first $last updated successfully<br/><br/>";
    echo '<a class="btn btn-primary btn-sm" href="mysql.php" role="button">Names</a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
}

mysqli_close($dbc);
include('includes/footer.html');
