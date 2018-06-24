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
echo "<table class='table table-hover'><thead><tr><th>FIRST</th><th>LAST</th></tr></thead><tbody>\n";

  while ($row = pg_fetch_assoc($result)) {
  echo "<tr><td>$row[first]</td><td>$row[last]</td></tr>\n";
}

echo '</tbody></table>';

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($connection);

include __DIR__.'/includes/footer.html';



