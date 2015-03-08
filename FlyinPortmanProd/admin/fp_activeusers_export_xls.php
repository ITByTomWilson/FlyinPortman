<?php
require_once './includes/art_db.php';
require_once './includes/art_functions.php';
require_once './languages/art_lang.php';

function xlsBOF(){
    print pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return; 
}

function xlsEOF() { 
    print pack("ss", 0x0A, 0x00);
    return; 
}

function xlsWriteNumber($Row, $Col, $Value){
    print pack("sssss", 0x203, 14, $Row, $Col, 0x0); 
    print pack("d", $Value); 
    return; 
}

function xlsWriteLabel($Row, $Col, $Value ){
    $L = strlen($Value); 
    print pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L); 
    print $Value; 
    return;
}

$dbname = $config_db;
$sqlexport = "SELECT 
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
  fp_users.userActive = 1";
$resultexport = mysql_query($sqlexport);

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=exportdata.xls "); 
header("Content-Transfer-Encoding: binary ");

xlsBOF(); 
xlsWriteLabel(1,0,"Active Users");
xlsWriteLabel(2, 0, "Token Code");
xlsWriteLabel(2, 1, "Rank");
xlsWriteLabel(2, 2, "First Name");
xlsWriteLabel(2, 3, "Last Name");
xlsWriteLabel(2, 4, "Membership Date");
xlsWriteLabel(2, 5, "User Email");
xlsWriteLabel(2, 6, "Birth Date");
xlsWriteLabel(2, 7, "Portable");
xlsWriteLabel(2, 8, "Microsoft");
xlsWriteLabel(2, 9, "Sony");
xlsWriteLabel(2, 10, "Computer");
xlsWriteLabel(2, 11, "Nintendo");
xlsWriteLabel(2, 12, "Site Admin");

$i = 0;
$xlsRow = 3;
while($rowexport = mysql_fetch_array($resultexport)){
    $i++;
    xlsWriteLabel($xlsRow, 0, art_rowdata($rowexport, 1));
    xlsWriteLabel($xlsRow, 1, art_rowdata($rowexport, 2));
    xlsWriteLabel($xlsRow, 2, art_rowdata($rowexport, 3));
    xlsWriteLabel($xlsRow, 3, art_rowdata($rowexport, 4));
    xlsWriteLabel($xlsRow, 4, art_rowdata($rowexport, 6));
    xlsWriteLabel($xlsRow, 5, art_rowdata($rowexport, 7));
    xlsWriteLabel($xlsRow, 6, art_rowdata($rowexport, 8));
    xlsWriteLabel($xlsRow, 7, art_rowdata($rowexport, 9));
    xlsWriteLabel($xlsRow, 8, art_rowdata($rowexport, 10));
    xlsWriteLabel($xlsRow, 9, art_rowdata($rowexport, 11));
    xlsWriteLabel($xlsRow, 10, art_rowdata($rowexport, 12));
    xlsWriteLabel($xlsRow, 11, art_rowdata($rowexport, 13));
    xlsWriteLabel($xlsRow, 12, art_rowdata($rowexport, 14));
    $xlsRow++;
}

xlsEOF();
exit();
?>
