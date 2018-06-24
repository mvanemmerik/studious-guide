<?php
require __DIR__.'/includes/pg.php';
$page_title='PostgreSQL Test';
include __DIR__.'/includes/header.html';



// generate and execute a query
$query = "SELECT * FROM names";
$result = pg_query($connection, $query) or die("Error in query: $query." . pg_last_error($connection));
// get the number of rows in the resultset

$rows = pg_num_rows($result);
echo "There are currently $rows records in the database.<br/><br/>";

echo "<table>\n";
echo "<th>First</th><th>Last</th><tr>\n";

while ($row = pg_fetch_row($result)) {
  echo "<tr><td>$row[1]</td><td>$row[2]</td></tr>";
}

echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($connection);

include __DIR__.'/includes/footer.html';



