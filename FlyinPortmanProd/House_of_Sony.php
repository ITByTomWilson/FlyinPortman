<!DOCTYPE html>
<?php
include "php/inc_loginCheck.php";

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	
	<title>Flyin Portman</title>
	<link href="css/style.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css" /><script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script src="js/tooltip.js" type="text/javascript"></script>
	<link href="css/tooltip.css" rel="stylesheet" /><script>
  		$(document).ready(function() {
    		$("#youtube").click(function() {
    			alert('Our YouTube channel is coming soon. Stay tuned!');
    		}); // end click
    		$("#gplus").click(function() {
    			alert('Coming soon.');
    		}); // end click
    		$('#sidebar img').each(function() {
    			var imgFile = $(this).attr('src');
    			var preloadImage = new Image();
    			var imgExt = /(\.\w{3,4}$)/;
    			preloadImage.src = imgFile.replace(imgExt,'_h$1');
    		$(this).hover(
    			function() {
    				$(this).attr('src', preloadImage.src);
    			},
    			function() {
    				$(this).attr('src', imgFile);
    			}); // end hover
    		}); // end each
 		 }); // end ready
        </script>
</head>
<body>
<div id="container">
<div id="header"><a href="index.html"><img alt="Home" height="200" src="images/header.png" width="960" /></a></div>

<div id="top_bar">
	<?php
		include "php/inc_loginHeader.php"
	?>
<ul>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Facebook', {position:2})"><a href="https://www.facebook.com/groups/flyinportman/"><img alt="Like us on Facebook." src="images/icon_fb.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Twitter', {position:2})"><a href="https://twitter.com/FlyinPortman"><img alt="Follow us on Twitter." src="images/icon_twitter.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Google Plus', {position:2})"><a href="#gplus" id="gplus"><img alt="Add us to your circles." src="images/icon_gplus.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'YouTube', {position:2})"><a href="#youtube" id="youtube"><img alt="Our YouTube channel." src="images/icon_youtube.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Email', {position:2})"><a href="contact.php"><img alt="Contact Us" src="images/icon_email.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Search', {position:2})"><a href="search.php"><img alt="Search" src="images/icon_search.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'FAQ', {position:2})"><a href="faq.php"><img alt="Frequently Asked Questions" src="images/icon_faq.png" /></a></li>
</ul>
</div>

<div id="content">
<div id="sonybanner"><img alt="sony_house_banner" height="200" src="images/sonybanner.png" width="690" /></div>

<div id="houses">
<ul>
	<li><a href="House_of_Microsoft.php"><img alt="Microsoft_House" height="140" src="images/microsofthouse.png" width="120" /></a></li>
	<li><a href="House_of_Sony.php"><img alt="Sony_House" height="140" src="images/sonyhouse.png" width="120" /></a></li>
	<li><a href="House_of_Nintendo.php"><img alt="Nintendo_House" height="140" src="images/nintendohouse.png" width="120" /></a></li>
	<li><a href="House_of_Portable.php"><img alt="Portable_House" height="140" src="images/housePortable.png" width="120" /></a></li>
	<li><a href="House_of_Computer.php"><img alt="Computer_House" height="140" src="images/computerhouse.png" width="120" /></a></li>
</ul>
</div>

<table>
	<thead>
		<tr>
			<td>Gamer Tag</td>
			<td>Console</td>
			<td>Time Zone</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>FlyinWeasol</td>
			<td>Playstation 3</td>
			<td>Eastern (GMT -5)</td>
		</tr>
		<tr>
			<td>FlyinGamer1</td>
			<td>Playstation 4</td>
			<td>Mountain (GMT -7)</td>
		</tr>
		<tr>
			<td>FlyinGamer2</td>
			<td>Playstation 4</td>
			<td>JST (GMT +9)</td>
		</tr>
		<tr>
			<td>FlyinGamer3</td>
			<td>Playstation 3</td>
			<td>Central (GMT -6)</td>
		</tr>
	</tbody>
</table>
</div>

<div id="sidebar">
<nav><a href="index.php"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.php"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.php"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.php" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>

<nav><a href="quarters.php" id="nav_quarters"><img alt="Members Quarters" src="images/nav_quarters_active.png" width="250" /></a></nav>

<nav><a href="hr.php" id="nav_hr"><img alt="Human Resources" src="images/nav_hr.png" width="250" /></a></nav>

<nav><a href="staff.php" id="nav_sm"><img alt="Staff Management" src="images/nav_sm.png" width="250" /></a></nav>

<nav><a href="admin.php" id="nav_admin"><img alt="Admin" src="images/nav_admin.png" width="250" /></a></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>
</body>
</html>