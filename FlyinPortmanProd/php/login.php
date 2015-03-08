<?php
/**
 * Created by PhpStorm.
 * User: TWilson
 * Date: 2/8/2015
 * Time: 6:42 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['loginmessage'] = "";
include 'inc_mySql.php.sample';
include 'inc_userprops.php.sample';



// Create connection
$con = new mysqli($servername, $username, $password, $dbname, 3306);

// Check connection
if ($con->connect_error)
{
    die('Could not connect: ' . mysql_error());
}

If (!empty($_POST['userid'])) {
    if (!empty($_POST['password'])) {
        $user = $_POST['userid'];
        $_SESSION["user"] = $user;
        $pass = $_POST['password'];
        $passhash = sha1($salt . $user . $pass);

        $sql = "SELECT * FROM v_siteaccess Where UserName =  '$user' LIMIT 0, 30;";
        echo $sql;

        $result = $con->query($sql);

        while ($row = $result->fetch_assoc())
        {
            if ($row["Password"] == $passhash)
            {

                $_SESSION['loggedin'] = 1;
                echo  $_SESSION['loggedin'];
                $_SESSION['rank'] = $row['Rank'];
                $_SESSION['firstname'] = $row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'];
                $_SESSION['active'] = $row['Active'];
                $_SESSION['membershipdate'] = $row['MembershipDate'];
                $_SESSION['portablehouse'] = $row['mobile'];
                $_SESSION['microsofthouse'] = $row['Microsoft'];
                $_SESSION['playstationhouse'] = $row['Playstation'];
                $_SESSION['pchouse'] = $row['PC'];
                $_SESSION['nintendohouse'] = $row['Nintendo'];
                $_SESSION['siteadmin'] = $row['Admin'];


                echo $_SESSION['loginmessage'];
                header('location: ../quarters.php');
            }else
            {
                $_SESSION['loginmessage'] = "Incorrect Token Code or Password!";
                echo $_SESSION['loginmessage'];
                header('location: ../index.php');
            }
        }

    }else
    {
        $_SESSION['loginmessage'] = "No Password!";
        echo $_SESSION['loginmessage'];
        header('location: ../index.php');
    }
}else
{
    $_SESSION['loginmessage'] = "No Token";
    echo $_SESSION['loginmessage'];
    header('location: ../index.php');
}

$con->close();
?>