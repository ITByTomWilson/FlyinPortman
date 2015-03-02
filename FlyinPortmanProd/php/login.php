<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 6:42 PM
 */

session_start();
if (!empty($_POST['userid']))
{
    if (!empty($_POST['password']))
    {
        $user = $_POST['userid'];
        $pass = $_POST['password'];
        $id5 = substr($user, 0, 5);
        $id6 = substr($user, 5, 1);
        $id7 = substr($user, 6);
        echo "id5: " . $id5 . "<br />";
        echo "id6: " . $id6 . "<br />";
        echo "id7: " . $id7 . "<br />";

        if (is_numeric($id5))
        {
            if (is_string($id6))
            {
                if (is_numeric($id7))
                {
                    if ($user == $pass)
                    {
                        $_SESSION["loggedin"] = 'true';
                        header('location: ../quarters.php');
                    }
                }else
                {
                    echo 'id7 is numeric: ' . is_numeric($id7);
                    header('location: ../index.php');
                }
            }else
            {
                echo 'id6 is numeric: ' . is_string($id6);
                header('location: ../index.php');
            }
        }else
        {
            echo 'id5 is numeric: ' . is_numeric($id5);
            header('location: ../index.php');
        }
    }
}else
{
    header('location: ../index.php');
}

?>