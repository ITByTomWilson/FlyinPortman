<?php
require_once './includes/art_functions.php';
require_once './fp_activeusers_const.php';

function art_simplesearch_display($search_value){
    $searchbox_caption = "Search (By Email or Token Code)";
    print "<div id=\"sch_defaulttheme\">";
    print "<br />\n";
    print "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"300\"  align=\"center\">\n";
    print "    <tr>\n";
    print "        <td class=\"schHeaderBGLeft\">&nbsp;</td>\n";
    print "        <td class=\"schHeaderBG\"><span class=\"schHeaderText\">" . $searchbox_caption . "</span>&nbsp;</td>\n";
    print "        <td class=\"schHeaderBGRight\">&nbsp;</td>\n";
    print "    </tr>\n";
    print "    <tr class=\"schBody\">\n";
    print "        <td class=\"schColumnBGLeft\">&nbsp;</td>\n";
    print "        <td valign=\"middle\" height=\"50\" align=\"center\">\n";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
    print "                <tr>\n";
    print "                    <td><input class=\"textbox\" type=\"text\" name=\"artsys_quick_search\" id=\"artsys_quick_search\" value=\"" . $search_value . "\"></td>\n";
    print "                    <td width=\"5\">&nbsp;</td>\n";
    print "                    <td><input class=\"button\" name=\"btn_search\" id=\"btn_search\" type=\"submit\" value=\"" . CAP_BUTTON_SEARCH . "\"></td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "        </td>\n";
    print "        <td class=\"schColumnBGRight\" >&nbsp;</td>\n";
    print "    </tr>\n";
    print "    <tr class=\"schFooter\">\n";
    print "        <td></td>\n";
    print "        <td></td>\n";
    print "        <td></td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>";
}

function art_simplesearch_sql($start_sql, $search_value) {
    $sql = "";
    if (!strpos(strtoupper($start_sql), "WHERE")) {
        $sql = " WHERE (";
    } else {
        $sql = " AND (";
    }
    $sql .= "fp_users.username LIKE '%" . $search_value . "%' ";
    $sql .= " OR fp_userprops.userEmail LIKE '%" . $search_value . "%' ";
    $sql .= ")";
    return $sql;
}

function art_append_sqlcondition($sql, $condition){
    if (!strpos(strtoupper($sql), "WHERE")) {
        $sql .= " WHERE (";
    } else {
        $sql .= " AND (";
    }
    $sql .= $condition;
    return $sql .= ")";
}

function art_split_sql($sql) {
    $ipos = strpos(  strtoupper($sql) , "ORDER BY") ;
    if ($ipos > 0) {
        $sql_array[0] = substr($sql, 1, $ipos - 1);
        $sql_array[1] = substr($sql, $ipos - 1, strlen($sql));
    } else {
        $sql_array[0] = $sql;
        $sql_array[1] = "";
    }
    return $sql_array;
}

function art_append_orderby($sql, $field) {
    $result = "";
    $str_orderby = " ORDER BY " . $field;
    $ipos = strpos(strtoupper($sql), "ORDER BY");
    if ($ipos > 0){
        $ipos = strpos(strtoupper($sql), strtoupper($field));
        if ($ipos > 0){
            $result = $sql;
        } else {
            $result = str_replace("ORDER BY", $str_orderby . ",", strtoupper($sql));
        }
    } else {
        $result = $str_orderby;
    }
    return $result;
}

function art_gridtoolbar_display($category){
    $hostname  = $_SERVER['HTTP_HOST'];
    $currentpath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $exportscript = "fp_activeusers_dialog_pdf.php";
    $exporturl = "http://$hostname$currentpath/$exportscript";
    print "<a href=\"javascript:art_export_pdf( '" . $exporturl . "' );\" title=\"" . CAP_EXPORT_PDF . "\"><img src=\"images/defaultbutton/pdf.gif\" border=\"0\" align=\"absmiddle\" ></a>\n";
    $exportscript  = "fp_activeusers_export_xls.php";
    $exporturl = "http://$hostname$currentpath/$exportscript";
    print "<a href=\"javascript:art_export_xls( '" . $exporturl . "' );\" title=\"" . CAP_EXPORT_XLS . "\"><img src=\"images/defaultbutton/xls.gif\" border=\"0\" align=\"absmiddle\" ></a>\n";
}

function art_datagrid_display($field_names, $page_size, $current_page, $quick_search, $navtype, $category, $showtotalrec=0, $showpagesize=0) {	
    $artsv_postback = art_request("artsys_postback", "");
    $sql = "";
    $sql_start = " ";
    $sql_condition = "";
    $sql_ext = "";
    $cssrow = "";
    $query_array = "";
    $querystr = ""; 
    $pagerecords = 0; 

    $field_columns = array (
        'fp_users.username'
        ,'fp_rank.fp_rankName'
        ,'fp_userprops.userFirstName'
        ,'fp_userprops.userLastName'
        ,'fp_users.membershipDate'
        ,'fp_userprops.userEmail'
        ,'fp_userprops.userBirthDate'
        ,'fp_refYesNo1.yesNoVal'
        ,'fp_refYesNo2.yesNoVal'
        ,'fp_refYesNo3.yesNoVal'
        ,'fp_refYesNo4.yesNoVal'
        ,'fp_refYesNo5.yesNoVal'
        ,'fp_refYesNo6.yesNoVal'
        ,''
        ,''
        ,''
	  );

    $qrystr = array_fill(0, 16, "");
    $clr = art_request("clr_fp_activeusers", "");
    $clr_adv_session = art_request("clr_fp_activeusers_adv_session", "");

    if (strtolower($clr) == "t"){
        art_clear_session("fp_activeusers_sort1");	
        art_clear_session("fp_activeusers_sort2");	
        art_clear_session("fp_activeusers_sort3");	
        art_clear_session("fp_activeusers_sort4");	
        art_clear_session("fp_activeusers_sort5");	
        art_clear_session("fp_activeusers_sort6");	
        art_clear_session("fp_activeusers_sort7");	
        art_clear_session("fp_activeusers_sort8");	
        art_clear_session("fp_activeusers_sort9");	
        art_clear_session("fp_activeusers_sort10");	
        art_clear_session("fp_activeusers_sort11");	
        art_clear_session("fp_activeusers_sort12");	
        art_clear_session("fp_activeusers_sort13");	
        art_clear_session("fp_activeusers_sort14");	
        art_clear_session("fp_activeusers_sort15");	
        art_clear_session("fp_activeusers_sort16");	
        $clr = "";
	  }

    if (strtolower($clr_adv_session) == "y") {
        $clr_adv_session = "";
        art_clear_session("fp_activeusers_search");
        art_clear_session("fp_activeusers_page");
        art_clear_session("fp_activeusers_quick_search");
        art_clear_session("fp_activeusers_category");
        $quick_search = "";
        $category = "";
	  }

    art_assign_session("fp_activeusers_sort1", "");
    art_assign_session("fp_activeusers_sort2", "");
    art_assign_session("fp_activeusers_sort3", "");
    art_assign_session("fp_activeusers_sort4", "");
    art_assign_session("fp_activeusers_sort5", "");
    art_assign_session("fp_activeusers_sort6", "");
    art_assign_session("fp_activeusers_sort7", "");
    art_assign_session("fp_activeusers_sort8", "");
    art_assign_session("fp_activeusers_sort9", "");
    art_assign_session("fp_activeusers_sort10", "");
    art_assign_session("fp_activeusers_sort11", "");
    art_assign_session("fp_activeusers_sort12", "");
    art_assign_session("fp_activeusers_sort13", "");
    art_assign_session("fp_activeusers_sort14", "");
    art_assign_session("fp_activeusers_sort15", "");
    art_assign_session("fp_activeusers_sort16", "");
    art_assign_session("fp_activeusers_page_size", 100);
    art_assign_session("fp_activeusers_page", "1");
    $sql_array  = art_split_sql(" SELECT 
  fp_users.fpUsersID AS UserID,
  fp_users.username,
  fp_rank.fp_rankName AS UserRank,
  fp_userprops.userFirstName AS FirstName,
  fp_userprops.userLastName AS LastName,
  fp_refYesNo.yesNoVal AS ActiveUser,
  fp_users.membershipDate,
  fp_userprops.userEmail,
  fp_userprops.userBirthDate,
  fp_refYesNo1.yesNoVal AS portable,
  fp_refYesNo2.yesNoVal AS microsoft,
  fp_refYesNo3.yesNoVal AS playstation,
  fp_refYesNo4.yesNoVal AS pc,
  fp_refYesNo5.yesNoVal AS nintendo,
  fp_refYesNo6.yesNoVal AS siteadmin
FROM
  fp_users
  LEFT OUTER JOIN fp_userprops ON (fp_users.fpUsersID = fp_userprops.fpUserID)
  LEFT OUTER JOIN fp_rank ON (fp_users.userRank = fp_rank.fpRankID)
  LEFT OUTER JOIN fp_refYesNo ON (fp_users.userActive = fp_refYesNo.refEnabledID)
  LEFT OUTER JOIN fp_userpermissions ON (fp_users.fpUsersID = fp_userpermissions.fpUsersID)
  INNER JOIN fp_refYesNo fp_refYesNo1 ON (fp_userpermissions.mobile = fp_refYesNo1.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo2 ON (fp_userpermissions.microsoft = fp_refYesNo2.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo3 ON (fp_userpermissions.playstation = fp_refYesNo3.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo4 ON (fp_userpermissions.pc = fp_refYesNo4.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo5 ON (fp_userpermissions.nintendo = fp_refYesNo5.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo6 ON (fp_userpermissions.admin = fp_refYesNo6.refEnabledID)
WHERE
  fp_users.userActive = 1"); 
    $sql_start = $sql_array[0]; 
    $sql_orderby = $sql_array[1]; 
    $sort1 = art_session("fp_activeusers_sort1", "");
    $sort2 = art_session("fp_activeusers_sort2", "");
    $sort3 = art_session("fp_activeusers_sort3", "");
    $sort4 = art_session("fp_activeusers_sort4", "");
    $sort5 = art_session("fp_activeusers_sort5", "");
    $sort6 = art_session("fp_activeusers_sort6", "");
    $sort7 = art_session("fp_activeusers_sort7", "");
    $sort8 = art_session("fp_activeusers_sort8", "");
    $sort9 = art_session("fp_activeusers_sort9", "");
    $sort10 = art_session("fp_activeusers_sort10", "");
    $sort11 = art_session("fp_activeusers_sort11", "");
    $sort12 = art_session("fp_activeusers_sort12", "");
    $sort13 = art_session("fp_activeusers_sort13", "");
    $sort14 = art_session("fp_activeusers_sort14", "");
    $sort15 = art_session("fp_activeusers_sort15", "");
    $sort16 = art_session("fp_activeusers_sort16", "");
    $page_size = art_session("fp_activeusers_page_size", "100");
    $page = art_session("fp_activeusers_page", "1");
    $current_page = $page;
    $search = "";
    $sql_condition = $sql_start . art_simplesearch_sql($sql_start, $quick_search);
    for ($i=1; $i<=16; $i++){
        $sorting = "";
        $sort_order = "";
        if (art_session("fp_activeusers_sort".$i, "") == "1"){
            $sorting = "&fp_activeusers_sort". $i . "=" . "2";
            $sort_order = "ASC";
        } else if (art_session("fp_activeusers_sort".$i, "") == "2"){
            $sorting = "&fp_activeusers_sort". $i . "=" . "1";
            $sort_order = "DESC";
        } else {
            $sorting = "&fp_activeusers_sort". $i . "=" . "1";
            $sort_order = "";
        }
        $qrystr[$i] = "fp_activeusers_ajax.php?clr_fp_activeusers=t".$sorting;

        if ($sort_order != ""){
            if ($sql_orderby == ""){
                $sql_orderby .= " ORDER BY " . $field_columns[$i - 1] . " " . $sort_order;
            } else {
                $sql_orderby .= ", " . $field_columns[$i - 1] . " " . $sort_order;
            }
        }
    }
    $advsearch_sql = art_session("fp_activeusers_search","");
    if ($advsearch_sql != "") {
      $sql_condition = art_append_sqlcondition($sql_condition, $advsearch_sql);
    }
    $sql_condition .= $sql_orderby;	
    $current_row = ($current_page - 1) * $page_size;
    $sql = $sql_condition;
    $result = mysql_query($sql);
    $numrows = 0;
    if ($result != null) { $numrows = mysql_num_rows($result); }
    $sql_ext = "";
    if ($numrows < $current_row) {
       $current_row =  $numrows - 1;
    }
    $sql_ext = " LIMIT " . $current_row . ", " . $page_size;
    $sql = $sql . " " . $sql_ext;
    $result = mysql_query($sql);

    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\" align=\"center\">\n";
    print "<tr>\n";
    print "<td>\n";
    print "<div id=\"mainmenu_defaulttheme\">\n";
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\">\n";
    print "    <tr>\n";
    print "    <td colspan=\"3\" valign=\"top\" class=\"mainMenuBG\" >\n";
    print "        <table align=\"center\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    print "            <tr>\n";
    $sessionlevel = art_session('art_user_level', -1);
    $menuprint = false;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_activeusers.php". "\"" . " title=\"Active Users\" target=\"_self\" class=\"mainMenuLink\"><div><p>Active Users</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_allusers.php". "\"" . " title=\"All Users\" target=\"_self\" class=\"mainMenuLink\"><div><p>All Users</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_rank.php". "\"" . " title=\"Ranks\" target=\"_self\" class=\"mainMenuLink\"><div><p>Ranks</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_networks.php". "\"" . " title=\"Networks\" target=\"_self\" class=\"mainMenuLink\"><div><p>Networks</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    print "            </tr>\n";
    print "        </table>\n";
    print "    </td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>\n";

    print "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
    print "<tr>\n";
    print "<td width=\"1\" rowspan=\"2\" align=\"left\" valign=\"top\">\n";
    print "</td>\n";
    print "<td align=\"left\" class=\"siteMenuGap\">&nbsp;</td>\n";
    print "<td align=\"left\" valign=\"top\">\n";
    art_simplesearch_display($quick_search);
    print "</td>\n";
    print "</tr>\n";
    print "<tr>\n";
    print "<td align=\"left\">&nbsp;</td>\n";
    print "<td align=\"left\">\n";
    print "<br />\n";
    print "<div id=\"defaulttheme\">";
    print "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridTable\"  width=\"90%\" align=\"center\">\n";
    print "    <tr>\n";
    print "        <td>\n";
    $gridtitle = "Active Users";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridHeader\" >\n";
    print "                <tr>\n";
    print "                    <td class=\"gridHeaderBGLeft\" nowrap >&nbsp;</td>\n";
    print "                    <td class=\"gridHeaderBG\" colspan=\"16\">\n";
    print "                        <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
    print "                            <tr>\n";
    print "                                <td valign=\"baseline\" ><span class=\"gridHeaderText\">" . $gridtitle . "</span></td>\n";
    print "                            </tr>\n";
    print "                        </table>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridHeaderBGRight\" nowrap >&nbsp;</td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridToolBar\" >\n";
    print "                <tr>\n";
    print "                    <td colspan=\"16\">\n";
    print "                        <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
    print "                            <tr>\n";
    print "                                <td valign=\"baseline\" >";
    art_gridtoolbar_display($category);
    print "                                </td>\n";
    print "                                <td align=\"right\">\n";
    print "<a href=\"" . art_gen_url("fp_activeusers_ajax.php?clr_fp_activeusers_adv_session=y", 1). "\"" . " title=\"Show All\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/show_all.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . art_gen_url("fp_activeusers_ajax.php?clr_fp_activeusers=t", 1). "\"" . " title=\"Clear Sort\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/clear_sort.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . "./fp_activeuserssearch.php". "\"" . " title=\"Advance Search\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/adv_search.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . "./fp_adduser.php". "\"" . " title=\"Add New\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/add.gif\" border=\"0\" /></a>";
    print "&nbsp;";
    print "                                </td>\n";
    print "                            </tr>\n";
    print "                        </table>\n";
    print "                    </td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridMain\" >\n";
    print "                <tr>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[1], 1) . "\" class=\"gridColumnLink\">Token Code</a>\n";
    if ($sort1 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[1] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort1 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[1] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort1) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[1] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[2], 1) . "\" class=\"gridColumnLink\">Rank</a>\n";
    if ($sort2 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[2] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort2 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[2] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort2) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[2] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[3], 1) . "\" class=\"gridColumnLink\">First Name</a>\n";
    if ($sort3 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[3] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort3 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[3] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort3) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[3] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[4], 1) . "\" class=\"gridColumnLink\">Last Name</a>\n";
    if ($sort4 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[4] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort4 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[4] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort4) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[4] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[5], 1) . "\" class=\"gridColumnLink\">Membership Date</a>\n";
    if ($sort5 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[5] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort5 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[5] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort5) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[5] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[6], 1) . "\" class=\"gridColumnLink\">User Email</a>\n";
    if ($sort6 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[6] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort6 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[6] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort6) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[6] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[7], 1) . "\" class=\"gridColumnLink\">Birth Date</a>\n";
    if ($sort7 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[7] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort7 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[7] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort7) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[7] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[8], 1) . "\" class=\"gridColumnLink\">Portable</a>\n";
    if ($sort8 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[8] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort8 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[8] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort8) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[8] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[9], 1) . "\" class=\"gridColumnLink\">Microsoft</a>\n";
    if ($sort9 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[9] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort9 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[9] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort9) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[9] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[10], 1) . "\" class=\"gridColumnLink\">Sony</a>\n";
    if ($sort10 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[10] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort10 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[10] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort10) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[10] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[11], 1) . "\" class=\"gridColumnLink\">Computer</a>\n";
    if ($sort11 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[11] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort11 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[11] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort11) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[11] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[12], 1) . "\" class=\"gridColumnLink\">Nintendo</a>\n";
    if ($sort12 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[12] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort12 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[12] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort12) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[12] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a href=\"" . art_gen_url($qrystr[13], 1) . "\" class=\"gridColumnLink\">Site Admin</a>\n";
    if ($sort13 == "1") {
        print "                            <a href=\"" . art_gen_url($qrystr[13] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_asc.gif\" border=\"0\" /></a>\n";
    } else if ($sort13 == "2"){
        print "                            <a href=\"" . art_gen_url($qrystr[13] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_desc.gif\" border=\"0\" /></a>\n";
    } else if (trim($sort13) == ""){
        print "                            <a href=\"" . art_gen_url($qrystr[13] ,1) . "\" class=\"gridColumnLink\"><img src=\"./images/defaultbutton/sort_none.gif\" border=\"0\" /></a>\n";
    }
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\" width=\"40px\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a class=\"gridColumnText\">Edit User</a>\n";
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\" width=\"40px\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a class=\"gridColumnText\">Edit Details</a>\n";
    print "                        </div>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridColumn\" width=\"40px\"  NOWRAP >\n";
    print "                        <div class=\"gridColumnText\">\n";
    print "                            <a class=\"gridColumnText\">Edit Permissions</a>\n";
    print "                        </div>\n";
    print "                    </td>\n";
    print "                </tr>\n";
    $emptydatatext = "No Record Found.";

    $layoutcolumn = 1;
    $icolumn = 0;
    $csscurrrow = "";
    $haveselectrow = false;
    $group = "";
    $currgroup = "";
    if ( ($numrows > 0) && ($result) ) {
        $i = 1;
        while ($row = mysql_fetch_array($result)){ 
            $pagerecords = $i;
            if (strtolower($csscurrrow) == "gridrow"){
                $csscurrrow = "gridRowAlternate";
            }else{
                $csscurrrow = "gridRow";
            }
            $cssrowover = "";
            $isrecmaster = false;
            if ($isrecmaster) {
                $haveselectrow = true;
                $cssrowover = "gridRowOver";
            }
            $cssrow = $csscurrrow;
            if ($cssrowover != "") {
                $cssrow = $cssrowover;
            }

            print "<tr class='".$cssrow."' >\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 1) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 2) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 3) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 4) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_format_date( art_rowdata($row, 6) , "m/d/Y") );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 7) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_format_date( art_rowdata($row, 8) , "m/d/Y") );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 9) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 10) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 11) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 12) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 13) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 14) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_edituser.php". "?edituserbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_editdetails.php". "?edituserdetailsbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_editpermissions.php". "?editpermissionsbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "</tr>\n";

            $i++;
        }
    } else {
        print "                <tr class=\"gridRow\">\n";
        print "                    <td colspan=\"16\" ><div class=\"gridErrMsg\">" . $emptydatatext . "</div></td>\n";
        print "                </tr>\n";
    }
    print "            </table>\n";
    print "            <table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridFooter\" >\n";
    print "                <tr>\n";
    print "                    <td class=\"gridFooterLeft\" nowrap >&nbsp;</td>\n";
    print "                    <td class=\"gridFooterBG\" colspan=\"16\">\n";
    if ( ($numrows > 0) && ($result) ){
        if (isset($_SERVER["QUERY_STRING"])){
            parse_str($_SERVER["QUERY_STRING"], $query_array);
            parse_str($_SERVER["QUERY_STRING"]."&page=1", $query_array);
            $querystr = art_remove_qrystring($query_array, "page, page_size, order1, order2, order3, sort1, sort2, sort3, clr");
        }
        $use_ajax = 1;
        $folder_button_images = "defaultbutton";
        if ($navtype != ""){
            $pagename = "fp_activeusers";
            art_show_navigator($pagename, $navtype, $numrows, $page_size, $current_page, "fp_activeusers_ajax.php", 1, 0, $use_ajax, $folder_button_images);
        }
    } else {
        print "                <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"inside\">\n";
        print "                    <tr>\n";
        print "                        <td class=\"gridFooterText\" align=\"right\"></td>\n";
        print "                    </tr>\n";
        print "                </table>\n";
    }
    print "                    </td>\n";
    print "                    <td class=\"gridFooterRight\" nowrap >&nbsp;</td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "        </td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>\n";

    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";
    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";

    print "<input type=\"hidden\" name=\"artsys_pagerecords\" value=\"".$pagerecords."\" >\n";
    print "<input type=\"hidden\" name=\"artsys_postback\" value=\"1\" >\n";
    print "<br />\n"; 
}

function del_selected_items($pagerecords) {
    $j = 0;
    $k = 0;
    $msg = "";
    for ($i=1; $i <= $pagerecords; $i++){
        $del_id = art_request("chk_delfile".$i, "");
        if ($del_id != ""){
            if ($j==0){

                $sqlDel = "DELETE FROM `` WHERE ";
                $qryDel = mysql_query($sqlDel);
                if($qryDel){
                    art_set_request("chk_delfile".$i, "");
                } else {
                    $j++;
                }
            } else {
                $j++;
            }
        } else {
            $k++;
		    }
    }
    if ($k == $pagerecords){
        $msg = MSG_MULTIDEL_NO_SELECTED;
    }
    if($j > 0){
        $msg = MSG_MULTIDEL_FAIL;
    }
    return $msg;
}

function art_groupdatagrid_display($field_names, $page_size, $current_page, $quick_search, $navtype, $category, $showtotalrec=0, $showpagesize=0) {	
    $artsv_postback = art_request("artsys_postback", "");
    $sql = "";
    $sql_start = " ";
    $sql_condition = "";
    $sql_ext = "";
    $cssrow = "";
    $query_array = "";
    $querystr = ""; 
    $pagerecords = 0; 
    $field_columns = array (
        'fp_users.username'
        ,'fp_rank.fp_rankName'
        ,'fp_userprops.userFirstName'
        ,'fp_userprops.userLastName'
        ,'fp_users.membershipDate'
        ,'fp_userprops.userEmail'
        ,'fp_userprops.userBirthDate'
        ,'fp_refYesNo1.yesNoVal'
        ,'fp_refYesNo2.yesNoVal'
        ,'fp_refYesNo3.yesNoVal'
        ,'fp_refYesNo4.yesNoVal'
        ,'fp_refYesNo5.yesNoVal'
        ,'fp_refYesNo6.yesNoVal'
        ,''
        ,''
        ,''
	  );

    $qrystr = array_fill(0, 16, "");

    $clr = art_request("clr_fp_activeusers", "");
    $clr_adv_session = art_request("clr_fp_activeusers_adv_session", "");

    if (strtolower($clr) == "t") {
        art_clear_session("fp_activeusers_sort1");	
        art_clear_session("fp_activeusers_sort2");	
        art_clear_session("fp_activeusers_sort3");	
        art_clear_session("fp_activeusers_sort4");	
        art_clear_session("fp_activeusers_sort5");	
        art_clear_session("fp_activeusers_sort6");	
        art_clear_session("fp_activeusers_sort7");	
        art_clear_session("fp_activeusers_sort8");	
        art_clear_session("fp_activeusers_sort9");	
        art_clear_session("fp_activeusers_sort10");	
        art_clear_session("fp_activeusers_sort11");	
        art_clear_session("fp_activeusers_sort12");	
        art_clear_session("fp_activeusers_sort13");	
        art_clear_session("fp_activeusers_sort14");	
        art_clear_session("fp_activeusers_sort15");	
        art_clear_session("fp_activeusers_sort16");	
        $clr = "";
	  }

    if (strtolower($clr_adv_session) == "y") {
        $clr_adv_session = "";
        art_clear_session("fp_activeusers_search");
        art_clear_session("fp_activeusers_page");
        art_clear_session("fp_activeusers_quick_search");
        art_clear_session("fp_activeusers_category");
        $quick_search = "";
        $category = "";
	  }
    art_assign_session("fp_activeusers_page_size", 100);
    art_assign_session("fp_activeusers_page", "1");
    art_assign_session("fp_activeusers_sort1", "");
    art_assign_session("fp_activeusers_sort2", "");
    art_assign_session("fp_activeusers_sort3", "");
    art_assign_session("fp_activeusers_sort4", "");
    art_assign_session("fp_activeusers_sort5", "");
    art_assign_session("fp_activeusers_sort6", "");
    art_assign_session("fp_activeusers_sort7", "");
    art_assign_session("fp_activeusers_sort8", "");
    art_assign_session("fp_activeusers_sort9", "");
    art_assign_session("fp_activeusers_sort10", "");
    art_assign_session("fp_activeusers_sort11", "");
    art_assign_session("fp_activeusers_sort12", "");
    art_assign_session("fp_activeusers_sort13", "");
    art_assign_session("fp_activeusers_sort14", "");
    art_assign_session("fp_activeusers_sort15", "");
    art_assign_session("fp_activeusers_sort16", "");
    $sql_array  = art_split_sql(" SELECT 
  fp_users.fpUsersID AS UserID,
  fp_users.username,
  fp_rank.fp_rankName AS UserRank,
  fp_userprops.userFirstName AS FirstName,
  fp_userprops.userLastName AS LastName,
  fp_refYesNo.yesNoVal AS ActiveUser,
  fp_users.membershipDate,
  fp_userprops.userEmail,
  fp_userprops.userBirthDate,
  fp_refYesNo1.yesNoVal AS portable,
  fp_refYesNo2.yesNoVal AS microsoft,
  fp_refYesNo3.yesNoVal AS playstation,
  fp_refYesNo4.yesNoVal AS pc,
  fp_refYesNo5.yesNoVal AS nintendo,
  fp_refYesNo6.yesNoVal AS siteadmin
FROM
  fp_users
  LEFT OUTER JOIN fp_userprops ON (fp_users.fpUsersID = fp_userprops.fpUserID)
  LEFT OUTER JOIN fp_rank ON (fp_users.userRank = fp_rank.fpRankID)
  LEFT OUTER JOIN fp_refYesNo ON (fp_users.userActive = fp_refYesNo.refEnabledID)
  LEFT OUTER JOIN fp_userpermissions ON (fp_users.fpUsersID = fp_userpermissions.fpUsersID)
  INNER JOIN fp_refYesNo fp_refYesNo1 ON (fp_userpermissions.mobile = fp_refYesNo1.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo2 ON (fp_userpermissions.microsoft = fp_refYesNo2.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo3 ON (fp_userpermissions.playstation = fp_refYesNo3.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo4 ON (fp_userpermissions.pc = fp_refYesNo4.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo5 ON (fp_userpermissions.nintendo = fp_refYesNo5.refEnabledID)
  INNER JOIN fp_refYesNo fp_refYesNo6 ON (fp_userpermissions.admin = fp_refYesNo6.refEnabledID)
WHERE
  fp_users.userActive = 1"); 
    $sql_start = $sql_array[0]; 
    $sql_orderby = $sql_array[1]; 

    $sort1 = art_session("fp_activeusers_sort1", "");
    $sort2 = art_session("fp_activeusers_sort2", "");
    $sort3 = art_session("fp_activeusers_sort3", "");
    $sort4 = art_session("fp_activeusers_sort4", "");
    $sort5 = art_session("fp_activeusers_sort5", "");
    $sort6 = art_session("fp_activeusers_sort6", "");
    $sort7 = art_session("fp_activeusers_sort7", "");
    $sort8 = art_session("fp_activeusers_sort8", "");
    $sort9 = art_session("fp_activeusers_sort9", "");
    $sort10 = art_session("fp_activeusers_sort10", "");
    $sort11 = art_session("fp_activeusers_sort11", "");
    $sort12 = art_session("fp_activeusers_sort12", "");
    $sort13 = art_session("fp_activeusers_sort13", "");
    $sort14 = art_session("fp_activeusers_sort14", "");
    $sort15 = art_session("fp_activeusers_sort15", "");
    $sort16 = art_session("fp_activeusers_sort16", "");
    $page_size = art_session("fp_activeusers_page_size", "100");
    $page = art_session("fp_activeusers_page", "1");
    $current_page = $page;
    $search = "";
    $sql_condition = $sql_start . art_simplesearch_sql($sql_start, $quick_search);
    for ($i=1; $i<=16; $i++){
        $sorting = "";
        $sort_order = "";
		    if (art_session("fp_activeusers_sort".$i, "") == "1"){
		    	  $sorting = "&fp_activeusers_sort". $i . "=" . "2";
            $sort_order = "ASC";
		    } else if (art_session("fp_activeusers_sort".$i, "") == "2"){
		        $sorting = "&fp_activeusers_sort". $i . "=" . "1";
            $sort_order = "DESC";
		    } else {
		        $sorting = "&fp_activeusers_sort". $i . "=" . "1";
            $sort_order = "";
		    }
        $qrystr[$i] = "fp_activeusers_ajax.php?clr_fp_activeusers=t".$sorting;

		    if ($sort_order != ""){
            if ($sql_orderby == ""){
	  	          $sql_orderby .= " ORDER BY " . $field_columns[$i - 1] . " " . $sort_order;
	          } else {
	  	          $sql_orderby .= ", " . $field_columns[$i - 1] . " " . $sort_order;
	          }
        }
    }
    $advsearch_sql = art_session("fp_activeusers_search","");
    if ($advsearch_sql != "") {
        $sql_condition = art_append_sqlcondition($sql_condition, $advsearch_sql);
    }
    $current_row = ($current_page - 1) * $page_size;
    $sql_condition .= $sql_orderby;	
    $sql = $sql_condition;
    $result = mysql_query($sql);
    $numrows = 0;
    if ($result != null) { $numrows = mysql_num_rows($result); }
    $sql_ext = "";
    if ($numrows < $current_row) {
       $current_row =  $numrows - 1;
    }
    $sql_ext = " LIMIT " . $current_row . ", " . $page_size;
    $sql = $sql  . " " . $sql_ext;
    $result = mysql_query($sql);
    $numrow1 = mysql_num_rows($result);

    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\" align=\"center\">\n";
    print "<tr>\n";
    print "<td>\n";
    print "<div id=\"mainmenu_defaulttheme\">\n";
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\">\n";
    print "    <tr>\n";
    print "    <td colspan=\"3\" valign=\"top\" class=\"mainMenuBG\" >\n";
    print "        <table align=\"center\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
    print "            <tr>\n";
    $sessionlevel = art_session('art_user_level', -1);
    $menuprint = false;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_activeusers.php". "\"" . " title=\"Active Users\" target=\"_self\" class=\"mainMenuLink\"><div><p>Active Users</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_allusers.php". "\"" . " title=\"All Users\" target=\"_self\" class=\"mainMenuLink\"><div><p>All Users</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_rank.php". "\"" . " title=\"Ranks\" target=\"_self\" class=\"mainMenuLink\"><div><p>Ranks</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    if ($menuprint) {
      print "                <td>\n";
      print "                    <span class=\"mainMenuText\">\n";
      print "                        &nbsp;|&nbsp;\n";
      print "                    </span>\n";
      print "                </td>\n";
      $menuprint = false;
    }
    print "                <td>\n";
    print "<a href=\"" . "./fp_networks.php". "\"" . " title=\"Networks\" target=\"_self\" class=\"mainMenuLink\"><div><p>Networks</p></div></a>";
    print "                </td>\n";
    $menuprint = true;
    print "            </tr>\n";
    print "        </table>\n";
    print "    </td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>\n";

    print "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
    print "<tr>\n";
    print "<td width=\"1\" rowspan=\"2\" align=\"left\" valign=\"top\">\n";
    print "</td>\n";
    print "<td align=\"left\" class=\"siteMenuGap\">&nbsp;</td>\n";
    print "<td align=\"left\" valign=\"top\">\n";
    art_simplesearch_display($quick_search);
    print "</td>\n";
    print "</tr>\n";
    print "<tr>\n";
    print "<td align=\"left\">&nbsp;</td>\n";
    print "<td align=\"left\">\n";
    print "<br />\n";
    print "<div id=\"defaulttheme\">";
    print "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridTable\"  width=\"90%\" align=\"center\">\n";
    print "    <tr>\n";
    print "        <td>\n";
    $gridtitle = "Active Users";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridHeader\" >\n";
    print "                <tr>\n";
    print "                    <td class=\"gridHeaderBGLeft\" nowrap >&nbsp;</td>\n";
    print "                    <td class=\"gridHeaderBG\" colspan=\"16\">\n";
    print "                        <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
    print "                            <tr>\n";
    print "                                <td valign=\"baseline\" ><span class=\"gridHeaderText\">" . $gridtitle . "</span></td>\n";
    print "                            </tr>\n";
    print "                        </table>\n";
    print "                    </td>\n";
    print "                    <td class=\"gridHeaderBGRight\" nowrap >&nbsp;</td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridToolBar\" >\n";
    print "                <tr>\n";
    print "                    <td colspan=\"16\">\n";
    print "                        <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
    print "                            <tr>\n";
    print "                                <td valign=\"baseline\" >";
    art_gridtoolbar_display($category);
    print "                                </td>\n";
    print "                                <td align=\"right\">\n";
    print "<a href=\"" . art_gen_url("fp_activeusers_ajax.php?clr_fp_activeusers_adv_session=y", 1). "\"" . " title=\"Show All\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/show_all.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . art_gen_url("fp_activeusers_ajax.php?clr_fp_activeusers=t", 1). "\"" . " title=\"Clear Sort\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/clear_sort.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . "./fp_activeuserssearch.php". "\"" . " title=\"Advance Search\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/adv_search.gif\" border=\"0\" /></a>";
    print "&nbsp;<a href=\"" . "./fp_adduser.php". "\"" . " title=\"Add New\" class=\"gridToolBarLink\"><img src=\"./images/defaultbutton/add.gif\" border=\"0\" /></a>";
    print "&nbsp;";
    print "                                </td>\n";
    print "                            </tr>\n";
    print "                        </table>\n";
    print "                    </td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridMain\" >\n";
    print "            <tbody>\n";
    print "                <tr>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Token Code</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Rank</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">First Name</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Last Name</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Membership Date</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">User Email</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Birth Date</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Portable</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Microsoft</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Sony</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Computer</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Nintendo</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Site Admin</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Edit User</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Edit Details</div></td>\n";
    print "                    <td class=\"gridColumn\" ><div class=\"gridColumnText\">Edit Permissions</div></td>\n";
    print "                </tr>\n";
    print "            </tbody>\n";
    $emptydatatext = "No Record Found.";
    $layoutcolumn = 1;
    $icolumn = 0;
    $csscurrrow = "";
    $haveselectrow = false;
    $group = "";
    $currgroup = "no_group_selected";
    $gr_1 = 0;
    $gr_2 = 1;
    if ( ($numrows > 0) && ($result) ){
        $i = 1;
        while ($row = mysql_fetch_array($result)){ 
            $pagerecords = $i;
            $group = art_rowdata($row, -1);
            if (strcmp($group, $currgroup) != 0){
                $currgroup = $group;
                $gr_1++;
                if ($gr_1 != $gr_2){
                    print "            </tbody>\n";
                }
                print "            <tbody id=\"header_gr_". $gr_1 ."\">\n"; 
                print "                <tr>\n"; 
                print "                    <td colspan=\"16\" class=\"groupCaption\">\n"; 
                print "                    <div class=\"gridToolBarText\" align=\"left\">";
                print "<a href=\"javascript:art_toggle_groupdetail('"."gr_".$gr_1."','"."bt_collapse_".$gr_1."','"."bt_expand_".$gr_1."');\" title=\"" . CAP_CLOSE_GROUP . "\">";
                print "<img type=\"image\" id=\"bt_collapse_".$gr_1."\" src=\"images/defaultbutton/ic_collapse.gif\" style=\"display:'\" border=\"0\" align=\"absmiddle\" alt=\"" . CAP_CLOSE_GROUP . "\" ></a>\n";
                print "<a href=\"javascript:art_toggle_groupdetail('"."gr_".$gr_1."','"."bt_collapse_".$gr_1."','"."bt_expand_".$gr_1."');\" title=\"" . CAP_EXPAND_GROUP . "\">";
                print "<img type=\"image\" id=\"bt_expand_".$gr_1."\" src=\"images/defaultbutton/ic_expand.gif\" style=\"display:none\" border=\"0\" align=\"absmiddle\" alt=\"" . CAP_EXPAND_GROUP . "\" ></a>\n";
                print "&nbsp;" . $currgroup . "\n";
                print "                    </div>\n";
                print "                    </td>\n";
                print "                </tr>\n";
                print "            </tbody>\n";
                print "            <tbody id=\""."gr_".$gr_1."\" style=\"display:'';\">";
            }
            if (strtolower($csscurrrow) == "gridrow"){
                $csscurrrow = "gridRowAlternate";
            }else{
                $csscurrrow = "gridRow";
            }
            $cssrowover = "";
            $isrecmaster = false;
            if ($isrecmaster) {
                $haveselectrow = true;
                $cssrowover = "gridRowOver";
            }
            $cssrow = $csscurrrow;
            if ($cssrowover != "") {
                $cssrow = $cssrowover;
            }
            print "<tr class='".$cssrow."' >\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 1) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 2) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 3) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 4) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_format_date( art_rowdata($row, 6) , "m/d/Y") );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 7) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_format_date( art_rowdata($row, 8) , "m/d/Y") );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 9) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 10) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 11) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 12) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 13) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            $svalue = art_check_null( art_rowdata($row, 14) );
            if ($svalue != "&nbsp;"){
                $svalue = htmlspecialchars($svalue);
            }
            print $svalue;
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_edituser.php". "?edituserbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_editdetails.php". "?edituserdetailsbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "<td align=\"center\" >";
            print "<a href=\"" . "./fp_editpermissions.php". "?editpermissionsbyid=" . art_rowdata_byname($row, $field_names, "fp_users.fpUsersID"). "\"" . " title=\"Edit\" target=\"_self\" class=\"gridBodyLink\">";
            $filename = "./images/defaultbutton/edit.gif";
            if ($filename == ""){
                $filename = "";
            }
            print "<img src=\"" . $filename . "\"  border=\"0\" />";
            print "</a>";
            print "</td>\n";
            print "</tr>\n";

            $i++;
        }
    }else {
        print "                <tr class=\"gridRow\">\n";
        print "                    <td colspan=\"16\" ><div class=\"gridErrMsg\">" . $emptydatatext . "</div></td>\n";
        print "                </tr>\n";
    }
    print "            </table>\n";
    print "            <table  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gridFooter\" >\n";
    print "                <tr>\n";
    print "                    <td class=\"gridFooterLeft\" nowrap >&nbsp;</td>\n";
    print "                    <td class=\"gridFooterBG\" colspan=\"16\">\n";
    if ( ($numrows > 0) && ($result) ) {
        if (isset($_SERVER["QUERY_STRING"])) {
            parse_str($_SERVER["QUERY_STRING"], $query_array);
            parse_str($_SERVER["QUERY_STRING"]."&page=1", $query_array);
            $querystr = art_remove_qrystring($query_array, "page, page_size, order1, order2, order3, sort1, sort2, sort3, clr");
        }
        $use_ajax = 1;
        $folder_button_images = "defaultbutton";
        if ($navtype != ""){
            $pagename = "fp_activeusers";
            art_show_navigator($pagename, $navtype, $numrows, $page_size, $current_page, "fp_activeusers_ajax.php", 1, 0, $use_ajax, $folder_button_images);
        }
    } else {
        print "                <table align=\"center\" width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"inside\">\n";
        print "                    <tr>\n";
        print "                        <td class=\"gridFooterText\" align=\"right\"></td>\n";
        print "                    </tr>\n";
        print "                </table>\n";
    }
    print "                    </td>\n";
    print "                    <td class=\"gridFooterRight\" nowrap >&nbsp;</td>\n";
    print "                </tr>\n";
    print "            </table>\n";
    print "        </td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>\n";

    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";
    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";

    print "<input type=\"hidden\" name=\"artsys_pagerecords\" value=\"" . $pagerecords . "\" >\n";
    print "<input type=\"hidden\" name=\"artsys_postback\" value=\"1\" >\n";
    print "<br />\n"; 
}
?>
