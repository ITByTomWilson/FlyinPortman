<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 8:16 PM
 */
session_start();
$_SESSION["loggedin"] = "false";
header('location: ../index.php');


?>