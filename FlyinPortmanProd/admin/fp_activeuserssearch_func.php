<?php
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';

function art_form_searchdata_display($form, $message){
    $disabled = "";
    $check = "";
    art_set_session('art_form_loaded', 0);
    $gridtitle = "";

	
    $artv_username = art_request("username", "");
    $artv_userrank = art_request("userrank", "");
    $artv_firstname = art_request("firstname", "");
    $artv_lastname = art_request("lastname", "");
    $artv_useremail = art_request("useremail", "");
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
    print "<td width=\"1\" align=\"left\" valign=\"top\">\n";
    print "</td>\n";
    print "<td align=\"left\" class=\"siteMenuGap\">&nbsp;</td>\n";
    print "<td valign=\"top\">\n";
    print "<br />\n";

    print "<div id=\"defaulttheme\">";
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"90%\" >\n";
    print "    <tr>\n";
    print "        <td class=\"formHeaderBGLeft\" nowrap >&nbsp;</td>\n";
    print "        <td class=\"formHeaderBG\"><span class=\"formHeaderText\">" . $gridtitle . "</span>&nbsp;</td>\n";
    print "        <td class=\"formHeaderBGRight\" nowrap >&nbsp;</td>\n";
    print "    </tr>\n";
    print "    <tr>\n";
    print "        <td class=\"formColumnBGLeft\" align=\"left\">&nbsp;</td>\n";
    print "        <td>\n";
    print "            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"formBody\" >\n";
    $value = $artv_username;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_username = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_username = $value;
    }
    $value = htmlspecialchars($value);
    $value_cond = "AND";
    $value_comp = "ct";
    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Username</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"username\" name=\"username\" type=\"text\" value=\"" . $value . "\"  size=\"25\" maxlength=\"25\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_userrank;
    if (($value == "") || ($value == null)) {
        $value = "";
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_userrank = $value;
    }
    $value_cond = "AND";
    $value_comp = "ct";
    $control_name = "userrank";
    $control_caption = "Rank";
    $sql = "SELECT * FROM `fp_rank`";
    $mastervalue = "";
    $keyfield = "";
    $css = '';
    $disabled = "true";
    $fieldvalue = "fpRankID";
    $fieldlabel = "fp_rankName";
    $url = "fp_activeuserssearch_ajax.php?rv=1";
    $ismaster = false;
            print "<tr>\n";
        print "<td class=\"formColumnCaption\">Rank</td>\n";
            print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
            print "<td class=\"formColumnData\" align=\"Left\">\n";
            $multiline = false;
            $size = "1";
            $width = "";
            $firstitem_label = "";
            $firstitem_value = "";
            art_combobox_display($control_name, $control_caption, $sql, $mastervalue, $keyfield, $css, $disabled, $fieldvalue, $fieldlabel, $value, $url, $ismaster, $multiline, $size, $width, $firstitem_label, $firstitem_value);
            print "</td>\n";
            print "</tr>\n";
    $value = $artv_firstname;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_firstname = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_firstname = $value;
    }
    $value = htmlspecialchars($value);
    $value_cond = "AND";
    $value_comp = "ct";
    print "<tr>\n";
    print "<td class=\"formColumnCaption\">First Name</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"firstname\" name=\"firstname\" type=\"text\" value=\"" . $value . "\"  size=\"25\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_lastname;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_lastname = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_lastname = $value;
    }
    $value = htmlspecialchars($value);
    $value_cond = "AND";
    $value_comp = "ct";
    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Last Name</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"lastname\" name=\"lastname\" type=\"text\" value=\"" . $value . "\"  size=\"25\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_useremail;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_useremail = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_useremail = $value;
    }
    $value = htmlspecialchars($value);
    $value_cond = "AND";
    $value_comp = "ct";
    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Email</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"useremail\" name=\"useremail\" type=\"text\" value=\"" . $value . "\"  size=\"25\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    print "	              <tr>\n";
    print "	                  <td class=\"formColumnCaption\"></td>\n";
    print "	                  <td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "	                  <td class=\"formColumnData\" align=\"left\"></br>\n";
    print "	                      <input name=\"btn_search\" id=\"btn_search\" type=\"submit\" value=\"" . CAP_BUTTON_SEARCH . "\" class=\"button\" >\n";
    $urldatapage = "href='" . "./fp_activeusers.php" . "'";
    print "	                  		<input name=\"btn_cancel\" id=\"btn_cancel\" type=\"reset\" value=\"" . CAP_BUTTON_CANCEL . "\" class=\"button\" onClick=\"javascript:window.location." . $urldatapage . " \">\n";
    print "                       <input type=\"hidden\" name=\"artsys_postback\" value=\"1\" >\n";
    print "	                  </br></br>\n";
    print "	                  </td>\n";
    print "	              </tr>\n";
    print "            </table>\n";
    print "        </td>\n";
    print "        <td class=\"formColumnBGRight\">&nbsp;</td>\n";
    print "    </tr>\n";
    print "    <tr>\n";
    print "        <td class=\"formFooterLeft\" nowrap >&nbsp;</td>\n";
    print "        <td class=\"formFooter\" align=\"center\" valign=\"middle\">&nbsp;</td>\n";
    print "        <td class=\"formFooterRight\" nowrap >&nbsp;</td>\n";
    print "    </tr>\n";
    print "</table>\n";
    print "</div>";

    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";
    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";

}

function art_search_data(){

    $fld_name = array();
    $fld_value = array();
    $fld_name[] = "fp_users.username";
    $fld_type[] = 1;
	  $fld_value[] = art_request("username", "");
    $fld_name[] = "fp_rank.fp_rankName";
    $fld_type[] = 1;
	  $fld_value[] = art_request("userrank", "");
    $fld_name[] = "fp_userprops.userFirstName";
    $fld_type[] = 1;
	  $fld_value[] = art_request("firstname", "");
    $fld_name[] = "fp_userprops.userLastName";
    $fld_type[] = 1;
	  $fld_value[] = art_request("lastname", "");
    $fld_name[] = "fp_userprops.userEmail";
    $fld_type[] = 1;
	  $fld_value[] = art_request("useremail", "");

    $result = "";
    $err_require = "";
    if ($err_require != "") {
	      return $err_require;
    }

    if ($result == "") {
        $cond_and = "";
        $cond_or = "";
        $sql_where = "";
        $icount = count($fld_name);
        for ($i=0; $i<$icount; $i++) {
            if ($fld_value[$i] != "") {
                $cond = "AND";
                $comp = "ct";
                if ($comp == "ct") {
                    $comp_sql = $fld_name[$i]." LIKE '%".$fld_value[$i]."%'"; 
	              } else if ($comp == "sw") {
                    $comp_sql = $fld_name[$i]." LIKE '".$fld_value[$i]."%'"; 
	              } else if ($comp == "ew") {
                    $comp_sql = $fld_name[$i]." LIKE '%".$fld_value[$i]."'"; 
	              } else {
                    if ($fld_type[$i] == 2) {
                        $comp_sql = $fld_name[$i]." ".$comp." ".$fld_value[$i];
                    } else if ($fld_type[$i] == 3) {
                        $comp_sql = $fld_name[$i]." ".$comp." '".$fld_value[$i]."'";
                    } else {
                        $comp_sql = $fld_name[$i]." ".$comp." '".$fld_value[$i]."'";
                    }
                }

                if ($cond == "AND") {
                    if ($cond_and == "") {
                        $cond_and = $comp_sql;
                    } else {
                        $cond_and = $cond_and . " AND " . $comp_sql;
                    }
	              } else {
                    if ($cond_or == "") {
                        $cond_or = $comp_sql;
                    } else {
                        $cond_or = $cond_or . " OR " . $comp_sql;
                    }
	              }
	          }
	          $sql_where = $cond_and;
            if ($sql_where == "") {
                $sql_where = $cond_or;
	          } else {
                if ($cond_or != "") {
                    $sql_where = "( " . $cond_and . " ) OR " . $cond_or;
	              }
	          }
		        art_set_session('fp_activeusers_search', $sql_where);
            art_set_session('art_form_loaded', 1);
	          $result = "SUCCESS";
        }
    }

	  return $result;
}
?>
