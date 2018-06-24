<?php
require __DIR__.'/includes/db.php';
$page_title='MYSQL Test';
include __DIR__.'/includes/header.html';

$sql="SELECT first, last FROM names ORDER BY first";

$result=mysqli_query($dbc,$sql);
$result2=mysqli_query($dbc,$sql);

// Numeric array
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    print $row[0].' '. $row[1].'<br/>';            
}
    
print "<br/><br/>";

// Associative array
while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
    print $row["first"] .' '. $row["last"].'<br/>';  ;             
}
    
// Free result set
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_close($dbc);

include __DIR__.'/includes/footer.html';

    