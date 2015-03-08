<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 8:16 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(session_id() == '') {
    session_start();
}
$_SESSION["loggedin"] = 0;
$_SESSION['loginmessage'] = "";
header('location: ../index.php');


?>