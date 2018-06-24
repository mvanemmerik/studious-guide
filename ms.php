<?php
require('includes/ms.php');
$page_title='MSSQL Test';
include __DIR__.'/includes/header.html';

$sql = 'SELECT  first, last FROM names';

$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    echo "Error in query preparation/execution.\n";
    die(print_r(sqlsrv_errors(), true));
}

echo "<TABLE><TR><TH>FIRST</TH><TH>LAST</TH></TR>\n";

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<TR><TD>$row[first]</TD><TD>$row[last]</TD></TR>\n";
}

echo '</TABLE>';
sqlsrv_free_stmt($stmt);
include __DIR__.'/includes/footer.html';
