<?php
require __DIR__.'/includes/db.php';
$page_title='MySQL Connection';
include __DIR__.'/includes/header.php';

$sql = 'SELECT id, first, last FROM names order by id';

$result=mysqli_query($dbc,$sql);

$rows = $result->num_rows;
// echo mysqli_get_server_version($dbc);
echo 'MySQL version: '.mysqli_get_server_info($dbc)."<br/>\n\n";
echo "There are currently $rows records in the database.<br/><br/>\n\n";
echo "<table class='table table-hover'><thead><tr><th>EDIT</th><th>FIRST</th><th>LAST</th><th>DELETE</th></tr></thead><tbody>\n";


// Associative array
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td><a href='update.php?myid=$row[id]'>$row[id]</a></td><td>$row[first]</td><td>$row[last]</td>";
    echo'<td><a href="javascript:delete_id('.$row['id'].')">'.$row['id'].'</a></td></tr>';         
}


echo "</tbody></table>\n\n";

echo '<a class="btn btn-danger btn-sm" href="add.php" role="button">Add Name</a>';

// Free result set
mysqli_free_result($result);
mysqli_close($dbc);

include __DIR__.'/includes/footer.html';

    