<?php
require('includes/ms.php');
$page_title='Microftsoft SQL Connection';
include __DIR__.'/includes/header.php';

if (isset($_SESSION["login_user"])) {

    $sql = 'SELECT first, last FROM names order by last, first';

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $sql , $params, $options );

    if ($stmt === false) {
        echo "Error in query preparation/execution.\n";
        die(print_r(sqlsrv_errors(), true));
    }

    $rows = sqlsrv_num_rows( $stmt );

    $server_info = sqlsrv_server_info( $conn);  
    if( $server_info )  
    {  
        foreach( $server_info as $key => $value)  
        {  
                //echo $key.": ".$value."\n";  
                if ($key == 'SQLServerVersion') {
                    $version = $value;
                }
        }  
    }  
    else  
    {  
        echo "Error in retrieving server info.\n";  
        die( print_r( sqlsrv_errors(), true));  
    }  

    echo "MSSQL version: $version<br/>\n\n";
    echo "There are currently $rows records in the database.<br/><br/>\n\n";

    echo "<table class='table table-hover'><thead><tr><th>FIRST</th><th>LAST</th></tr></thead><tbody>\n";

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<tr><td>$row[first]</td><td>$row[last]</td></tr>\n";
    }

    echo "</tbody></table>\n\n";
    sqlsrv_free_stmt($stmt);
    include __DIR__.'/includes/footer.html';

} else {
    header('Location: login.php');
}
