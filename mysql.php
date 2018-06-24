<?php
require __DIR__.'/includes/db.php';
$page_title='MySQL Connection';
include __DIR__.'/includes/header.html';

$sql = 'SELECT first, last FROM names order by last, first';

$result=mysqli_query($dbc,$sql);

$rows = $result->num_rows;
echo "There are currently $rows records in the database.<br/><br/>\n\n";

echo "<table class='table table-hover'><thead><tr><th>FIRST</th><th>LAST</th></tr></thead><tbody>\n";


// Associative array
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>$row[first]</td><td>$row[last]</td></tr>\n";           
}

echo "</tbody></table>\n\n";

// Free result set
mysqli_free_result($result);
mysqli_close($dbc);

include __DIR__.'/includes/footer.html';

    