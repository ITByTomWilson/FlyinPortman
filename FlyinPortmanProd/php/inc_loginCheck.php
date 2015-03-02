<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 10:20 PM
 */

session_start();
if (!empty($_SESSION['loggedin']))
{
    if ($_SESSION['loggedin'] == 'true')
    {
        //echo $_SESSION['loggedin'];

    }
    else
    {
        //echo 'logged off';
        header('location: index.php');
    }

}else
{
    //echo 'logged off';
    header('location: index.php');
}


?>