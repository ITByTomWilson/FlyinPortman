<!DOCTYPE html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	<title></title>
</head>
<body></body>
</html>
<title></title>
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
<div>
<h1><img alt="Search" height="50" src="images/search_title.png" width="400" /></h1>
</div>
</div>

<div id="sidebar">
<nav><a href="index.php"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.php"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.php"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.php" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>

<nav></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>