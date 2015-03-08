<?php
/**
 * Created by PhpStorm.
 * User: twilson
 * Date: 3/6/2015
 * Time: 3:22 PM
 */

$servername = "box977.bluehost.com:3306";
$username = "flyinpor_userDB";
$password = "P3ps1c0la!";
$dbname = "flyinpor_users";
$salt = "W.1.N.G.$.";

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
                    $_SESSION['loggedin'] = 'true';
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

                    $_SESSION['loginmessage'] = 'Logged On';
                    echo $_SESSION['loginmessage'];
                    header('location: ../quarters.php');
                }else
                {
                    $_SESSION['loginmessage'] = " Incorrect Token Code or Password! Username: $user Password: $pass Pass Hash: $passhash";
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