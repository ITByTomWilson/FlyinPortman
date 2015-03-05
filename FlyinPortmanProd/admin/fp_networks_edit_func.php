<?php
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';

function art_form_updatedata_display($form, $message){
    $field_names = array (
        "fp_networks.fpNetworkID"
        ,"fp_networks.networkName"
        ,"fp_networks.enabled"
        ,"fp_networks.sysDTStamp"
    );

    $artv_pm_fpNetworkID = art_request("pm_fpNetworkID", "");
    $artv_fpnetworkid = art_request("lbhd_fpnetworkid", "");
    $artv_networkname = art_request("networkname", "");
    $artv_enabled = art_request("enabled", "");
    $artv_sysdtstamp_year = art_request("sysdtstamp_year", "");
    $artv_sysdtstamp_month = art_request("sysdtstamp_month", "");
    $artv_sysdtstamp_day = art_request("sysdtstamp_day", "");
    if (($artv_sysdtstamp_year != "")
     && ($artv_sysdtstamp_month != "")
     && ($artv_sysdtstamp_day != "")) {
        $artv_sysdtstamp = $artv_sysdtstamp_year."-".$artv_sysdtstamp_month."-".$artv_sysdtstamp_day;
    } else {
        $artv_sysdtstamp = "";
    }

    $disabled = "";
    $check = "";
    art_set_session('art_form_loaded', 0);
    $gridtitle = "Fp Networks Edit";

    $aj = art_request("aj", ""); 
    if (($aj != "1") && ($message == "")){
        $sql = "select * from `fp_networks`";
        $sql .= " WHERE ";
        $sql .= " fp_networks.fpNetworkID = " .  art_quote_intval($artv_pm_fpNetworkID);
        $query = mysql_query($sql);
        if ($query){
            $row = mysql_fetch_array($query);
        } else {
            $submiturl = "./fp_networks.php";
            art_show_errormsg(MSG_EXECUTE_SQL_FAIL, $submiturl);
            exit;
        }
        $artv_message = "";
        $artv_fpnetworkid =  number_format( art_rowdata($row, 0) , 2, '.', ',' ) ;
        $artv_networkname =  art_rowdata($row, 1) ;
        $artv_enabled =  art_rowdata($row, 2) ;
        $artv_sysdtstamp =  art_rowdata($row, 3) ;

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
    $svalue = art_check_null($artv_fpnetworkid);
    if ($svalue != "&nbsp;"){
        $svalue = htmlspecialchars($svalue);
    }
    print "<tr>\n";
    print "<td class=\"formColumnCaption\">FpNetworkID</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<label id=\"fpnetworkid\" name=\"fpnetworkid\" >" . $svalue . "</label>\n";
    print"<input id=\"lbhd_fpnetworkid\" name=\"lbhd_fpnetworkid\" type=\"hidden\" value=\"" . $svalue . "\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_networkname;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_networkname = $value;
    }
    $value = htmlspecialchars($value);

    print "<tr>\n";
    print "<td class=\"formColumnCaption\">NetworkName</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"networkname\" name=\"networkname\" type=\"text\" value=\"" . $value . "\"  size=\"45\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_enabled;
    if (($value == "") || ($value == null)) {
        $value = "";
        $artv_enabled = $value;
    }
    $value = htmlspecialchars($value);

    print "<tr>\n";
    print "<td class=\"formColumnCaption\">Enabled</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<input class=\"textbox\" id=\"enabled\" name=\"enabled\" type=\"text\" value=\"" . $value . "\"  size=\"45\" maxlength=\"45\" >\n";
    print "</td>\n";
    print "</tr>\n";
    $value = $artv_sysdtstamp;
    if (($value == "") || ($value == null)) {
        $value = "";
    }
    $v_year = "";
    $v_month = "";
    $v_day = "";
    $v_hour = "";
    $v_minute = "";
    $v_second = "";
    if ($value != "") {
      $datevalue = getdate(strtotime($value));
      if (is_array($datevalue)) {
        $v_year = $datevalue['year'];
        $v_month = str_pad($datevalue['mon'], 2, '0', STR_PAD_LEFT);
        $v_day = str_pad($datevalue['mday'], 2, '0', STR_PAD_LEFT);
        $v_hour = str_pad($datevalue['hours'], 2, '0', STR_PAD_LEFT);
        $v_minute = str_pad($datevalue['minutes'], 2, '0', STR_PAD_LEFT);
        $v_second = str_pad($datevalue['seconds'], 2, '0', STR_PAD_LEFT);
      }
    }

    print "<tr>\n";
    print "<td class=\"formColumnCaption\">SysDTStamp</td>\n";
    print "<td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "<td class=\"formColumnData\" align=\"left\">\n";
    print "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr>\n";
    print "<td valign=\"top\" style=\"padding-left:2px\">\n";
    print "<select class=\"combobox\" name=\"sysdtstamp_day\" id=\"sysdtstamp_day\" style=\"width: 50px\">";
    print "<option value=\"\"></option>";
    if ($v_day == "01") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"01\" $selected >01</option>";
    if ($v_day == "02") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"02\" $selected >02</option>";
    if ($v_day == "03") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"03\" $selected >03</option>";
    if ($v_day == "04") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"04\" $selected >04</option>";
    if ($v_day == "05") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"05\" $selected >05</option>";
    if ($v_day == "06") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"06\" $selected >06</option>";
    if ($v_day == "07") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"07\" $selected >07</option>";
    if ($v_day == "08") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"08\" $selected >08</option>";
    if ($v_day == "09") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"09\" $selected >09</option>";
    if ($v_day == "10") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"10\" $selected >10</option>";
    if ($v_day == "11") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"11\" $selected >11</option>";
    if ($v_day == "12") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"12\" $selected >12</option>";
    if ($v_day == "13") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"13\" $selected >13</option>";
    if ($v_day == "14") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"14\" $selected >14</option>";
    if ($v_day == "15") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"15\" $selected >15</option>";
    if ($v_day == "16") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"16\" $selected >16</option>";
    if ($v_day == "17") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"17\" $selected >17</option>";
    if ($v_day == "18") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"18\" $selected >18</option>";
    if ($v_day == "19") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"19\" $selected >19</option>";
    if ($v_day == "20") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"20\" $selected >20</option>";
    if ($v_day == "21") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"21\" $selected >21</option>";
    if ($v_day == "22") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"22\" $selected >22</option>";
    if ($v_day == "23") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"23\" $selected >23</option>";
    if ($v_day == "24") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"24\" $selected >24</option>";
    if ($v_day == "25") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"25\" $selected >25</option>";
    if ($v_day == "26") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"26\" $selected >26</option>";
    if ($v_day == "27") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"27\" $selected >27</option>";
    if ($v_day == "28") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"28\" $selected >28</option>";
    if ($v_day == "29") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"29\" $selected >29</option>";
    if ($v_day == "30") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"30\" $selected >30</option>";
    if ($v_day == "31") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"31\" $selected >31</option>";
    print "</select>&nbsp;";
    print "</td><td valign=\"top\" style=\"padding-left:2px\">\n";
    print "<select class=\"combobox\" name=\"sysdtstamp_month\" id=\"sysdtstamp_month\" style=\"width: 50px\">";
    print "<option value=\"\"></option>";
    if ($v_month == "01") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"01\" $selected >Jan</option>";
    if ($v_month == "02") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"02\" $selected >Feb</option>";
    if ($v_month == "03") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"03\" $selected >Mar</option>";
    if ($v_month == "04") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"04\" $selected >Apr</option>";
    if ($v_month == "05") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"05\" $selected >May</option>";
    if ($v_month == "06") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"06\" $selected >Jun</option>";
    if ($v_month == "07") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"07\" $selected >Jul</option>";
    if ($v_month == "08") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"08\" $selected >Aug</option>";
    if ($v_month == "09") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"09\" $selected >Sep</option>";
    if ($v_month == "10") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"10\" $selected >Oct</option>";
    if ($v_month == "11") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"11\" $selected >Nov</option>";
    if ($v_month == "12") {$selected = "selected";} else {$selected = "";}
    print "<option value=\"12\" $selected >Dec</option>";
    print "</select>&nbsp;";
    print "</td><td valign=\"top\" style=\"padding-left:2px\">\n";
    print "<input class=\"textbox\" name=\"sysdtstamp_year\" type=\"text\" value=\"$v_year\" id=\"sysdtstamp_year\" size=\"4\"/>";
    print "</td>\n";
    print "<td valign=\"top\" style=\"padding-left:2px\">\n";
    print "<input type=\"image\" name=\"sysdtstamp_btn\" id=\"sysdtstamp_btn\" src=\"components/calendar/basicgray/images/img_calendar.gif\" onclick =\"displayCalendarSelectBox('sysdtstamp_year','sysdtstamp_month','sysdtstamp_day',false,false,this); return false;\"style=\"border-width:0px;cursor: hand\" />";
    print "</td></tr></table>\n";
    print "</td>\n";
    print "</tr>\n";
    print "	                   <tr>\n";
    print "	                       <td class=\"formColumnCaption\"></td>\n";
    print "	                       <td width=\"3\" class=\"formColumnData\">&nbsp;</td>\n";
    print "	                       <td class=\"formColumnData\" align=\"left\"></br>\n";
    print "	                           <input name=\"btn_save\" id=\"btn_save\" type=\"submit\" value=\"" . CAP_BUTTON_SAVE . "\" class=\"button\" >\n";
    $urldatapage = "href='" . "./fp_networks.php" . "'";
    print "	                  		     <input name=\"btn_cancel\" id=\"btn_cancel\" type=\"reset\" value=\"" . CAP_BUTTON_CANCEL . "\" class=\"button\" onClick=\"javascript:window.location." . $urldatapage . " \">\n";
    print "	                           <input type=\"hidden\" name=\"pm_fpNetworkID\" value=\"".$artv_pm_fpNetworkID."\">\n";	
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
    $artv_pm_fpNetworkID = art_request("pm_fpNetworkID", "");

    $artv_message = art_request("message", "");
    $artv_fpnetworkid = art_request("lbhd_fpnetworkid", "");
    $artv_networkname = art_request("networkname", "");
    $artv_enabled = art_request("enabled", "");
    $artv_sysdtstamp_year = art_request("sysdtstamp_year", "");
    $artv_sysdtstamp_month = art_request("sysdtstamp_month", "");
    $artv_sysdtstamp_day = art_request("sysdtstamp_day", "");
    if (($artv_sysdtstamp_year != "")
     && ($artv_sysdtstamp_month != "")
     && ($artv_sysdtstamp_day != "")) {
        $artv_sysdtstamp = $artv_sysdtstamp_year."-".$artv_sysdtstamp_month."-".$artv_sysdtstamp_day;
    } else {
        $artv_sysdtstamp = "";
    }
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
        $sql = " UPDATE `fp_networks` SET ";
        $sql .= " fp_networks.networkName = " .  art_quote_strval($artv_networkname); 
        $sql .= ",fp_networks.enabled = " .  art_quote_strval($artv_enabled); 
        $sql .= ",fp_networks.sysDTStamp = " .  art_quote_dateval($artv_sysdtstamp); 
        $sql .= " WHERE ";
        $sql .= " fp_networks.fpNetworkID = " .  art_quote_intval($artv_pm_fpNetworkID);
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
