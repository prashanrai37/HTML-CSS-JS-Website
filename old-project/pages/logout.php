<?php
session_start();
if (isset($_SESSION['success']))
{
    $_SESSION['success'] = false;
    session_destroy();
    $_SESSION = array();
}
header('location: ../index.php');
?>
