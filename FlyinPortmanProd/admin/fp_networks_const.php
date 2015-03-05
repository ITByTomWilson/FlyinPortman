<?php
$field_names = array (
    "fp_networks.fpNetworkID"
    ,"fp_networks.networkName"
    ,"fp_networks.enabled"
    ,"fp_networks.sysDTStamp"
);

$current_page = "";
$page_size = art_session("fp_networks_page_size", "20");
$page = art_session("fp_networks_page", "1");
$quick_search = art_session("fp_networks_quick_search", "");
$category = "";
art_assign_session("artsys_pagerecords", "");
$artsv_pagerecords = art_session("artsys_pagerecords", "");
$artsv_postback = art_request("artsys_postback", "");
$err_string = art_request("fp_networks_err_string", "");
$pagestyle = art_request("fp_networks_pagestyle", "");
$navtype = "text";
?>
