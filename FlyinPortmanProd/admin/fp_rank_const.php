<?php
$field_names = array (
    "fp_rank.fpRankID"
    ,"fp_rank.fp_rankName"
    ,"fp_rank.fp_rankDetails"
    ,"fp_rank.sysCreateDTS"
    ,"fp_rank.sysUpdateDTS"
);

$current_page = "";
$page_size = art_session("fp_rank_page_size", "20");
$page = art_session("fp_rank_page", "1");
$quick_search = art_session("fp_rank_quick_search", "");
$category = "";
art_assign_session("artsys_pagerecords", "");
$artsv_pagerecords = art_session("artsys_pagerecords", "");
$artsv_postback = art_request("artsys_postback", "");
$err_string = art_request("fp_rank_err_string", "");
$pagestyle = art_request("fp_rank_pagestyle", "");
$navtype = "text";
?>
