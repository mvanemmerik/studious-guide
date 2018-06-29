<?php
$page_title = 'Add';
include 'includes/header.php';

if (!isset($_SESSION["login_user"])) {
    echo "Please sign in";
} else {

    ?>

    <div id="wrapper" class='col-md-4'>
    <article>
        <div class="heading">
            <h2>Update Name</h2>
        </div>
        <div class="content">
            <form role="form" method="post" action="insert.php">
                <div class="form-group">
                    <label for="first">First: </label>
                    <input type="text" id="first" name ='first' class="form-control" required='required' />

                    <label for="last">Last: </label>
                    <input type="text" id="last" name ='last' class="form-control" required='required' />
                </div>
                <INPUT TYPE="submit" value="Add Name" class="btn btn-success btn-sm"/>
            </form>
        </div>
    </article>
  </div>

<?php

}


include('includes/footer.html');
