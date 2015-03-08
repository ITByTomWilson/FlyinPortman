<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 10:20 PM
 */

if (isset($_SESSION['loggedin']))
{
    if ($_SESSION['loggedin'] == 1) {
        if ($_SESSION['redirect'] != 'true')
        {
            $_SESSION['loginmessage'] = '';
            if (basename($_SERVER['PHP_SELF']) == 'House_of_Computer.php') {
                if ($_SESSION['pchouse'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized for House of Computer';
                    header('location: quarters.php');
                }
            } elseif (basename($_SERVER['PHP_SELF']) == 'House_of_Microsoft.php') {
                if ($_SESSION['microsofthouse'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized for House of Microsoft';
                    header('location: quarters.php');
                }
            } elseif (basename($_SERVER['PHP_SELF']) == 'House_of_Nintendo.php') {
                if ($_SESSION['nintendohouse'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized for House of Nintendo';
                    header('location: quarters.php');
                }
            } elseif (basename($_SERVER['PHP_SELF']) == 'House_of_Portable.php') {
                if ($_SESSION['portablehouse'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized for House of Portable';
                    header('location: quarters.php');
                }
            } elseif (basename($_SERVER['PHP_SELF']) == 'House_of_Sony.php') {
                if ($_SESSION['playstationhouse'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized for House of Sony';
                    header('location: quarters.php');
                }
            } elseif (basename($_SERVER['PHP_SELF']) == 'admin.php') {
                if ($_SESSION['siteadmin'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized as site admin';
                    header('location: quarters.php');
                }
            }elseif (basename($_SERVER['PHP_SELF']) == 'staff.php') {
                if ($_SESSION['siteadmin'] == 0) {
                    $_SESSION['redirect'] = 'true';
                    $_SESSION['loginmessage'] = 'Not authorized as site admin';
                    header('location: quarters.php');
                }
            }
        }else
        {
            $_SESSION['redirect'] = '';
        }
    }
    else
    {
        $_SESSION['loginmessage'] = 'Not Logged In';
        $_SESSION['redirect'] = 'true';
        header('location: index.php');
    }

}else
{
    //echo 'logged off';
    $_SESSION['loginmessage'] = 'No session variables';
    header('location: index.php');
    //$_SESSION['loginmessage'] = "logged off";
}


?>