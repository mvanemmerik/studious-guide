<?php

session_start();


if ($_SESSION["login_user"] == true) {
    session_destroy();
    header('Location: index.php');
} else {
    header('Location: index.php');
}
