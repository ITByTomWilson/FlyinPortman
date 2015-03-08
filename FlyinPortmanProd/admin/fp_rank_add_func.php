<?php
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';

function art_form_insertdata_display($form, $message){
    $artv_fp_rankname = art_request("fp_rankname", "");
    $artv_fp_rankdetails = art_request("fp_rankdetails", "");
    $disabled = "";
    art_set_session('art_form_loaded', 0);
    $check = "";
    $gridtitle = "Fp Rank Add";
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
    if ($message != "" ){
        print "<tr>\n";
        print "<td class=\"formColumnCaption\">Message</td>\n";
        print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
        print "<td class=\"formColumnData\" align=\"left\">\n";
        print "<label class=\"errMsg\" >" . $message . "</label>\n";
        print "</td>\n";
        print "</tr>\n";
    }
    $value = $artv_fp_rankname;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_fp_rankname = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_fp_rankname = $value;
    }
    $value = htmlspecialchars($value);

    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Rank</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"fp_rankname\" name=\"fp_rankname\" type=\"text\" value=\"" . $value . "\"  size=\"45\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_fp_rankdetails;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_fp_rankdetails = $value;
    }
    $artsv_postback = art_request("artsys_postback", "");
    if (($artsv_postback == null) || ($artsv_postback == "")){
        $value = "";
        $artv_fp_rankdetails = $value;
    }
    $value = htmlspecialchars($value);

    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Details</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"fp_rankdetails\" name=\"fp_rankdetails\" type=\"text\" value=\"" . $value . "\"  size=\"45\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    print "	              <tr>\n";
    print "	                  <td class=\"formColumnCaption\"></td>\n";
    print "	                  <td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "	                  <td class=\"formColumnData\" align=\"left\"></br>\n";
    print "		                      <input name=\"btn_save\" id=\"btn_save\" type=\"submit\" value=\"" . CAP_BUTTON_SAVE . "\" class=\"button\" >\n";
    $urldatapage = "href='" . "./fp_rank.php" . "'";
    print "		                      <input name=\"btn_cancel\" id=\"btn_cancel\" type=\"reset\" value=\"" . CAP_BUTTON_CANCEL . "\" class=\"button\" onClick=\"javascript:window.location." . $urldatapage . " \">\n";
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

function art_insert_data() {
    $msg = "";
    $report = "";
    $err_require = "";
    $artv_message = art_request("message", "");
    $artv_fp_rankname = art_request("fp_rankname", "");
    $artv_fp_rankdetails = art_request("fp_rankdetails", "");
    $err_require = "";

    if ($err_require != "") {
	      return $err_require;
    }

    $result = "";
    if ($result != ""){
        return $result;
    }

    if (($result == "") && (art_session('art_form_loaded', 0) != 1)){
        $sql = "INSERT INTO `fp_rank`";
        $sql .= " (";
        $sql .= "fp_rank.fp_rankName"; 
        $sql .= ",fp_rank.fp_rankDetails"; 
        $sql .= ") ";
        $sql .= " VALUES "; 
        $sql .= " (";
        $sql .=  art_quote_strval($artv_fp_rankname); 
        $sql .= " , " .  art_quote_strval($artv_fp_rankdetails); 
       $sql .= ") ";
    }

    if ($result == "") {
		    $query = mysql_query($sql);
			  if (!$query) {
				    $result .= MSG_INSERT_RECORD_FAIL;
				    $result .= "</br>Error: " . mysql_error();
			  } else {

            $result = "SUCCESS";
            art_set_session('art_form_loaded', 1);
        }
    }
    return $result;
}
?>
