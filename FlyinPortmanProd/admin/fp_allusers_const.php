<?php
$field_names = array (
    "fp_users.fpUsersID"
    ,"fp_users.username"
    ,"fp_rank.fp_rankName"
    ,"fp_userprops.userFirstName"
    ,"fp_userprops.userLastName"
    ,"fp_refYesNo.yesNoVal"
    ,"fp_users.membershipDate"
    ,"fp_userprops.userEmail"
    ,"fp_userprops.userBirthDate"
    ,"fp_refYesNo1.yesNoVal"
    ,"fp_refYesNo2.yesNoVal"
    ,"fp_refYesNo3.yesNoVal"
    ,"fp_refYesNo4.yesNoVal"
    ,"fp_refYesNo5.yesNoVal"
    ,"fp_refYesNo6.yesNoVal"
);

$current_page = "";
$page_size = art_session("fp_allusers_page_size", "100");
$page = art_session("fp_allusers_page", "1");
$quick_search = art_session("fp_allusers_quick_search", "");
$category = "";
art_assign_session("artsys_pagerecords", "");
$artsv_pagerecords = art_session("artsys_pagerecords", "");
$artsv_postback = art_request("artsys_postback", "");
$err_string = art_request("fp_allusers_err_string", "");
$pagestyle = art_request("fp_allusers_pagestyle", "");
$navtype = "text";
$artsv_act_search = trim(art_request("btn_search", ""));
$artsv_quick_search = art_request("artsys_quick_search", "");
?>
