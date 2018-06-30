<?php
require __DIR__.'/includes/db.php';
$page_title='MySQL Connection';
include __DIR__.'/includes/header.php';

if (isset($_SESSION["login_user"])) {
    $sql = 'SELECT id, first, last FROM names order by id';

    $result=mysqli_query($dbc,$sql);

    $rows = $result->num_rows;
    echo 'MySQL version: '.mysqli_get_server_info($dbc)."<br/>\n\n";
    echo "There are currently $rows records in the database.<br/><br/>\n\n";
    echo "<table class='table table-hover'><thead><tr><th>FIRST</th><th>LAST</th><th>ACTION</th></tr></thead><tbody>\n";


    // Associative array
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr><td>$row[first]</td><td>$row[last]</td>";
        echo "<td><a href='update.php?myid=$row[id]'><span class='glyphicon glyphicon-edit'></span></a>";
        echo "<a href='javascript:delete_id($row[id])'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";         
    }

    echo "</tbody></table>\n\n";

    echo '<a class="btn btn-danger btn-sm" href="add.php" role="button">Add Name</a>';

    // Free result set
    mysqli_free_result($result);
    mysqli_close($dbc);

    include __DIR__.'/includes/footer.html';

} else {
    header('Location: login.php');
}

    