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
);

$current_page = "";
$page_size = art_session("fp_activeusers_page_size", "20");
$page = art_session("fp_activeusers_page", "1");
$quick_search = art_session("fp_activeusers_quick_search", "");
$category = "";
art_assign_session("artsys_pagerecords", "");
$artsv_pagerecords = art_session("artsys_pagerecords", "");
$artsv_postback = art_request("artsys_postback", "");
$err_string = art_request("fp_activeusers_err_string", "");
$pagestyle = art_request("fp_activeusers_pagestyle", "");
$navtype = "text";
?>
