<?php
require __DIR__.'/includes/pg.php';
$page_title='PostgreSQL Connection';
include __DIR__.'/includes/header.php';

if (isset($_SESSION["login_user"])) {

  // generate and execute a query

  $sql = 'SELECT first, last FROM names order by last, first';

  $result = pg_query($connection, $sql) or die("Error in query: $query." . pg_last_error($connection));
  // get the number of rows in the resultset

  $rows = pg_num_rows($result);

  $version = pg_version($connection);
    
  echo 'PostgreSQL version: '.$version['client']."<br/>\n\n";


  echo "There are currently $rows records in the database.<br/><br/>\n\n";

  echo "<table>\n";
  echo "<table class='table table-hover'><thead><tr><th>FIRST</th><th>LAST</th></tr></thead><tbody>\n";

    while ($row = pg_fetch_assoc($result)) {
    echo "<tr><td>$row[first]</td><td>$row[last]</td></tr>\n";
  }

  echo "</tbody></table>\n\n";

  // Free resultset
  pg_free_result($result);

  // Closing connection
  pg_close($connection);

  include __DIR__.'/includes/footer.html';

} else {
  header('Location: login.php');
}



