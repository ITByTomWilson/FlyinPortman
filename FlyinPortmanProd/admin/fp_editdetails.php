<?php
if (session_id() == ""){
    session_start();
}
require_once './includes/art_config.php';
require_once './includes/art_db.php';
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';
require_once './fp_editdetails_func.php';


art_setdefault_session('art_form_loaded', 0);
$cssfile = "./css/defaulttheme.css";
$cssname = "defaulttheme";
$header_text = "";
$err_string = art_request("err_string", "");
$artsv_postback = art_request("artsys_postback", "");
$refresh_view = art_request("rv", "0");

$artv_edituserdetailsbyid = art_request("edituserdetailsbyid", "");
	
$artv_message = art_request("message", "");
$artv_userfirstname = art_request("userfirstname", "");
$artv_userlastname = art_request("userlastname", "");
$artv_useremail = art_request("useremail", "");
$artv_userbirthdate_year = art_request("userbirthdate_year", "");
$artv_userbirthdate_month = art_request("userbirthdate_month", "");
$artv_userbirthdate_day = art_request("userbirthdate_day", "");
if (($artv_userbirthdate_year != "")
 && ($artv_userbirthdate_month != "")
 && ($artv_userbirthdate_day != "")){
    $artv_userbirthdate = $artv_userbirthdate_year."-".$artv_userbirthdate_month."-".$artv_userbirthdate_day;
} else {
    $artv_userbirthdate = "";
}

if (($artsv_postback == "1") && ($refresh_view != "1")){
    $err_string = art_update_data();	
}
if ($err_string == "SUCCESS"){
    $submiturl = "./fp_activeusers.php";
    header("location: " . $submiturl);
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit User Details</title>
<meta name="generator" content="ScriptArtist v3">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./css/globalcss.css" rel="stylesheet" type="text/css">
<link href="./css/defaulttheme.css" rel="stylesheet" type="text/css">
<link href="./css/loadingmsg.css" rel="stylesheet" type="text/css">
<link href="components/calendar/basicgray/jscalendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="./js/prototype.js"></script>
<script language="javascript" type="text/javascript" src="./js/art_ajax.js"></script>
<script language="javascript" type="text/javascript" src="./js/art_msg.js"></script>
<script language="javascript" type="text/javascript" src="components/calendar/basicgray/jscalendar.js"></script>
</head>
<iframe id="ifrmSearch" frameborder="0" style="position: absolute; filter: progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0);
display: none; width: 100%; height: 100%; z-index: 999;" scrolling="no"></iframe>
<div id="mainAreaLoading" style="display: None;">
<?php
art_waitingmsg_display();
?>
</div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>
                <form name="art_form" id="art_form" method="post" action="fp_editdetails.php"  style="margin: 0px; padding: 0px;">
                    <div id="art_ajaxpanel1">
                        <?php art_form_updatedata_display("art_form", $err_string); ?>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</body>
</html>
<?php	art_db_connection_close(); ?>
