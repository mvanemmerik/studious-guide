<?php
$page_title = 'Name Added';
include('includes/header.php');
require('includes/db.php');

if ($_SESSION["login_user"] != true) {
    echo("Access denied!");
    exit();
}


$email = $_SESSION["login_user"];

$first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING);
$last = filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING);

$query = "select first, last from names WHERE first = '$first' AND last = '$last'";
$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);


if ($rowCount > 0) {
    echo "Please try another name.\n";
} else {
    $sql = "INSERT INTO names (first, last) VALUES ('$first', '$last')";

    if (mysqli_query($dbc, $sql)) {
        echo "Name created successfully $first $last.";
        echo '<a class="btn btn-primary btn-sm" href="mysql.php" role="button">Names</a>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    } 
}


mysqli_close($dbc);
include('includes/footer.html');
