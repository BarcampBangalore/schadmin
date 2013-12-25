<?php
session_start();

if (!isset($_SESSION['auth']))
{
    header("Location: login.php");
    exit();
}

require_once 'dbcon.php';
//mysqli_select_db("wordpress", $mysql);

?>