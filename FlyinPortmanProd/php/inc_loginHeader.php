<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 10:28 PM
 */

if ($_SESSION['loggedin'] == 1)
{
    echo "<form id=\"logoff\" action=\"php/logoff.php\" method=\"post\"><input id=\"submit\" name=\"submit\" type=\"submit\" value=\"Logoff\" /></form>";
}else{
    echo "<form id=\"login\" action=\"php/login.php\" method=\"post\"><label for=\"userid4\">User ID:</label> <input class=\"required\" id=\"userid4\" name=\"userid\" type=\"text\" /> &nbsp; &nbsp; &nbsp; <label for=\"password\">Password:</label> <input class=\"required\" id=\"password\" name=\"password\" type=\"password\" /> &nbsp; &nbsp; &nbsp; <input id=\"submit\" name=\"submit\" type=\"submit\" value=\"Submit\" /></form>";
}

?>