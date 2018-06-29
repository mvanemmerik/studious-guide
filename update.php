<?php
$page_title = 'Update';
include('includes/header.php');
require('includes/db.php');

if ($_SESSION["login_user"] != true) {
    echo("Access denied!");
    exit();
}

//$myid = $_GET['myid'];
$myid = filter_input(INPUT_GET, 'myid', FILTER_VALIDATE_INT);

$query = "select * from names WHERE id = $myid";

$results = @mysqli_query($dbc, $query);
$rowCount = mysqli_num_rows($results);


echo "<h1>Update Name</h1>\n";

if ($rowCount > 0) {
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        print<<<_HTML_
        <div id="wrapper" class='col-md-4'>
        <article>
            <div class="heading">
                <h2>Add Name</h2>
            </div>
            <div class="content">
                <form role="form" method="post" action="update2.php">
                    <div class="form-group">
                    <input type="hidden" name="myid" value="$myid">
                        <label for="first">First: </label>
                        <input type="text" id="first" name ='first' class="form-control" required='required' value="$row[first]"/>

                        <label for="last">Last: </label>
                        <input type="text" id="last" name ='last' class="form-control" required='required' value="$row[last]"/>
                    </div>
                    <INPUT TYPE="submit" value="Update Name" class="btn btn-success btn-sm"/>
                </form>
            </div>
        </article>
      </div>

_HTML_;
    }
}
mysqli_close($dbc);
include('includes/footer.html');
