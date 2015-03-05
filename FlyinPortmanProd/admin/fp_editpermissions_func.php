<?php
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';

function art_form_updatedata_display($form, $message){
    $field_names = array (
        "fp_userpermissions.fpUserPermID"
        ,"fp_userpermissions.fpUsersID"
        ,"fp_userpermissions.mobile"
        ,"fp_userpermissions.microsoft"
        ,"fp_userpermissions.playstation"
        ,"fp_userpermissions.pc"
    );

    $artv_editpermissionsbyid = art_request("editpermissionsbyid", "");
    $artv_portable = art_request("portable", "");
    $artv_microsoft = art_request("microsoft", "");
    $artv_playstation = art_request("playstation", "");
    $artv_pc = art_request("pc", "");

    $disabled = "";
    $check = "";
    art_set_session('art_form_loaded', 0);
    $gridtitle = "";

    $aj = art_request("aj", ""); 
    if (($aj != "1") && ($message == "")){
        $sql = "select * from `fp_userpermissions`";
        $sql .= " WHERE ";
        $sql .= " fp_userpermissions.fpUsersID = " .  art_quote_strval($artv_editpermissionsbyid);
        $query = mysql_query($sql);
        if ($query){
            $row = mysql_fetch_array($query);
        } else {
            $submiturl = "./fp_activeusers.php";
            art_show_errormsg(MSG_EXECUTE_SQL_FAIL, $submiturl);
            exit;
        }
        $artv_message = "";
        $artv_portable =  number_format( art_rowdata($row, 2) , 2, '.', ',' ) ;
        $artv_microsoft =  number_format( art_rowdata($row, 3) , 2, '.', ',' ) ;
        $artv_playstation =  number_format( art_rowdata($row, 4) , 2, '.', ',' ) ;
        $artv_pc =  number_format( art_rowdata($row, 5) , 2, '.', ',' ) ;

    }
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\" align=\"center\">\n";
    print "<tr>\n";
    print "<td>\n";
    print "<div id=\"mainmenu_defaulttheme\">\n";
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"100%\">\n";
    print "    <tr>\n";
    print "    <td colspan=\"3\" valign=\"top\" class=\"mainMenuBG\" >\n";
    print "        <table align=\"left\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
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
    print "<a href=\"" . "./fp_networks.php". "\"" . " title=\"Social Networks\" target=\"_self\" class=\"mainMenuLink\"><div><p>Social Networks</p></div></a>";
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
    print "    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  width=\"90%\" >\n";
    print "        <tr>\n";
    print "            <td class=\"formHeaderBGLeft\" nowrap >&nbsp;</td>\n";
    print "            <td class=\"formHeaderBG\"><span class=\"formHeaderText\">" . $gridtitle . "</span>&nbsp;</td>\n";
    print "            <td class=\"formHeaderBGRight\" nowrap >&nbsp;</td>\n";
    print "        </tr>\n";
    print "        <tr>\n";
    print "            <td class=\"formColumnBGLeft\" align=\"left\">&nbsp;</td>\n";
    print "            <td>\n";
    print "                <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"formBody\" >\n";
    if ($message != "" ){
        print "<tr>\n";
        print "<td class=\"formColumnCaption\">Message</td>\n";
        print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
        print "<td class=\"formColumnData\" align=\"left\">\n";
        print "<label class=\"errMsg\" >" . $message . "</label>\n";
        print "</td>\n";
        print "</tr>\n";
    }
    $value = $artv_portable;
    if (($value == "") || ($value == null)) {
        $value = "";
    }

    $control_name = "portable";
    $control_caption = "Portable";
    $sql = " SELECT * FROM `fp_refYesNo`";
    $mastervalue = "";
    $keyfield = "";
    $css = '';
    $disabled = "true";
    $fieldvalue = "refEnabledID";
    $fieldlabel = "yesNoVal";
    $url = "fp_editpermissions_ajax.php?rv=1";
    $ismaster = false;
            print "<tr>\n";
        print "<td class=\"formColumnCaption\">Portable</td>\n";
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
    $value = $artv_microsoft;
    if (($value == "") || ($value == null)) {
        $value = "";
    }

    $control_name = "microsoft";
    $control_caption = "Microsoft";
    $sql = " SELECT * FROM `fp_refYesNo`";
    $mastervalue = "";
    $keyfield = "";
    $css = '';
    $disabled = "true";
    $fieldvalue = "refEnabledID";
    $fieldlabel = "yesNoVal";
    $url = "fp_editpermissions_ajax.php?rv=1";
    $ismaster = false;
            print "<tr>\n";
        print "<td class=\"formColumnCaption\">Microsoft</td>\n";
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
    $value = $artv_playstation;
    if (($value == "") || ($value == null)) {
        $value = "";
    }

    $control_name = "playstation";
    $control_caption = "Playstation";
    $sql = " SELECT * FROM `fp_refYesNo`";
    $mastervalue = "";
    $keyfield = "";
    $css = '';
    $disabled = "true";
    $fieldvalue = "refEnabledID";
    $fieldlabel = "yesNoVal";
    $url = "fp_editpermissions_ajax.php?rv=1";
    $ismaster = false;
            print "<tr>\n";
        print "<td class=\"formColumnCaption\">Playstation</td>\n";
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
    $value = $artv_pc;
    if (($value == "") || ($value == null)) {
        $value = "";
    }

    $control_name = "pc";
    $control_caption = "PC";
    $sql = " SELECT * FROM `fp_refYesNo`";
    $mastervalue = "";
    $keyfield = "";
    $css = '';
    $disabled = "true";
    $fieldvalue = "refEnabledID";
    $fieldlabel = "yesNoVal";
    $url = "fp_editpermissions_ajax.php?rv=1";
    $ismaster = false;
            print "<tr>\n";
        print "<td class=\"formColumnCaption\">PC</td>\n";
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
    print "	                   <tr>\n";
    print "	                       <td class=\"formColumnCaption\"></td>\n";
    print "	                       <td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "	                       <td class=\"formColumnData\" align=\"left\"></br>\n";
    print "	                           <input name=\"btn_save\" id=\"btn_save\" type=\"submit\" value=\"" . CAP_BUTTON_SAVE . "\" class=\"button\" >\n";
    $urldatapage = "href='" . "./fp_activeusers.php" . "'";
    print "	                  		     <input name=\"btn_cancel\" id=\"btn_cancel\" type=\"reset\" value=\"" . CAP_BUTTON_CANCEL . "\" class=\"button\" onClick=\"javascript:window.location." . $urldatapage . " \">\n";
    print "	                           <input type=\"hidden\" name=\"editpermissionsbyid\" value=\"".$artv_editpermissionsbyid."\">\n";	
    print "                            <input type=\"hidden\" name=\"artsys_postback\" value=\"1\" >\n";
    print "	                       </br></br>\n";
    print "	                       </td>\n";
    print "	                   </tr>\n";
    print "                </table>\n";
    print "            </td>\n";
    print "            <td class=\"formColumnBGRight\">&nbsp;</td>\n";
    print "        </tr>\n";
    print "        <tr>\n";
    print "            <td class=\"formFooterLeft\" nowrap >&nbsp;</td>\n";
    print "            <td class=\"formFooter\" align=\"center\" valign=\"middle\">&nbsp;</td>\n";
    print "            <td class=\"formFooterRight\" nowrap >&nbsp;</td>\n";
    print "        </tr>\n";
    print "    </table>\n";
    print "</div>";

    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";
    print "</td>\n";
    print "</tr>\n";
    print "</table>\n";

}

function art_update_data(){
    $result = "";
    $msg = "";
    $artv_editpermissionsbyid = art_request("editpermissionsbyid", "");

    $artv_message = art_request("message", "");
    $artv_portable = art_request("portable", "");
    $artv_microsoft = art_request("microsoft", "");
    $artv_playstation = art_request("playstation", "");
    $artv_pc = art_request("pc", "");
    $err_require = "";
    if ($err_require != "") {
        return $err_require;
    }

    $result = "";
    $err_require = "";
    if ($err_require != ""){
	      return $err_require;
    }
    $result = "";
    if ($result != ""){
        return $result;
    }
    $sql = "";
    if (($result == "") && (art_session('art_form_loaded', 0) != 1)){
        $sql = " UPDATE `fp_userpermissions` SET ";
        $sql .= " fp_userpermissions.mobile = " .  art_quote_intval($artv_portable); 
        $sql .= ",fp_userpermissions.microsoft = " .  art_quote_intval($artv_microsoft); 
        $sql .= ",fp_userpermissions.playstation = " .  art_quote_intval($artv_playstation); 
        $sql .= ",fp_userpermissions.pc = " .  art_quote_intval($artv_pc); 
        $sql .= " WHERE ";
        $sql .= " fp_userpermissions.fpUsersID = " .  art_quote_strval($artv_editpermissionsbyid);
    }

    if ($result == ""){
		    $query = mysql_query($sql);
		    if (!$query){
			      $result .= MSG_UPDATE_RECORD_FAIL;
				    $result .= "</br>Error: " . mysql_error();
		    } else {

	          $result = "SUCCESS";
	          art_setdefault_session('art_form_loaded', 1);
		    }
    }
    return $result;
}
?>
