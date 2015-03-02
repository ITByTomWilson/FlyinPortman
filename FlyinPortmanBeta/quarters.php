<!DOCTYPE html>
<?php
session_start();
if (!empty($_SESSION['loggedin']))
{
	if ($_SESSION['loggedin'] == 'true')
	{
		echo $_SESSION['loggedin'];

	}
	else
	{
		echo 'logged off';
		header('location: index.php');
	}

}else
{
	echo 'logged off';
	header('location: index.php');
}

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
	<form id="login" action="php/login.php" method="post"><label for="userid4">User ID:</label> <input class="required" id="userid4" name="userid" type="text" /> &nbsp; &nbsp; &nbsp; <label for="password">Password:</label> <input class="required" id="password" name="password" type="password" /> <input id="submit" name="submit" type="submit" value="Submit" /></form><form id="logoff" action="php/logoff.php" method="post"><input id="submit" name="submit" type="submit" value="Logoff" /></form>

<ul>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Facebook', {position:2})"><a href="https://www.facebook.com/groups/flyinportman/"><img alt="Like us on Facebook." src="images/icon_fb.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Twitter', {position:2})"><a href="https://twitter.com/FlyinPortman"><img alt="Follow us on Twitter." src="images/icon_twitter.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Google Plus', {position:2})"><a href="#gplus" id="gplus"><img alt="Add us to your circles." src="images/icon_gplus.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'YouTube', {position:2})"><a href="#youtube" id="youtube"><img alt="Our YouTube channel." src="images/icon_youtube.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Email', {position:2})"><a href="contact.html"><img alt="Contact Us" src="images/icon_email.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'Search', {position:2})"><a href="search.html"><img alt="Search" src="images/icon_search.png" /></a></li>
	<li class="tooltip" onmouseover="tooltip.pop(this, 'FAQ', {position:2})"><a href="faq.html"><img alt="Frequently Asked Questions" src="images/icon_faq.png" /></a></li>
</ul>
</div>

<div id="content">
<div>
<h1><img alt="Members Quarters" height="50" src="images/quarters_title.png" width="400" /></h1>
</div>

<div id="houses">
<ul>
	<li><a href="House_of_Microsoft.html"><img alt="Microsoft_House" height="140" src="images/microsofthouse.png" width="120" /></a></li>
	<li><a href="House_of_Sony.html"><img alt="Sony_House" height="140" src="images/sonyhouse.png" width="120" /></a></li>
	<li><a href="House_of_Nintendo.html"><img alt="Nintendo_House" height="140" src="images/nintendohouse.png" width="120" /></a></li>
	<li><a href="House_of_Portable.html"><img alt="Portable_House" height="140" src="images/housePortable.png" width="120" /></a></li>
	<li><a href="House_of_Computer.html"><img alt="Computer_House" height="140" src="images/computerhouse.png" width="120" /></a></li>
</ul>
</div>
</div>

<div id="sidebar">
<nav><a href="index.html"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.html"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.html"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.html" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>

<nav><a href="quarters.html" id="nav_quarters"><img alt="Members Quarters" src="images/nav_quarters_active.png" width="250" /></a></nav>

<nav><a href="hr.html" id="nav_hr"><img alt="Human Resources" src="images/nav_hr.png" width="250" /></a></nav>

<nav><a href="staff.html" id="nav_sm"><img alt="Staff Management" src="images/nav_sm.png" width="250" /></a></nav>

<nav><a href="admin.html" id="nav_admin"><img alt="Admin" src="images/nav_admin.png" width="250" /></a></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>
</body>
</html>
