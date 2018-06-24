<?php
require __DIR__.'/includes/db.php';
$page_title='Home';
include __DIR__.'/includes/header.html';
?>

<ul>
    <li><a href='mysql.php'>MySQL</a></li>
    <li><a href='ms.php'>Microsoft SQL</a></li>
    <li><a href='pg.php'>PostgreSQL</a></li>
</ul>

<?php
include __DIR__.'/includes/footer.html';
