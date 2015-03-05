<?php
require_once './includes/art_config.php';
require_once './includes/art_db.php';
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';
require_once './fp_rank_add_func.php';

art_setdefault_session('art_form_loaded', 0);
$header_text = "";
$err_string = "";
$artsv_postback = art_request("artsys_postback", "");
$refresh_view = art_request("rv", "0");

if (($artsv_postback == "1") && ($refresh_view != "1")){
		art_insert_data();
}

if ($err_string == "SUCCESS"){
    $submiturl = "./fp_rank.php";
    header("location: " . $submiturl);
    exit;
}

art_form_insertdata_display("art_form", $err_string);
art_db_connection_close();
?>
