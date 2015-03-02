<!DOCTYPE html>

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
<div>
<h1><img alt="Join Us" height="50" src="images/join_title.png" width="400" /></h1>

<p>Thank you for interest in helping us out! &nbsp;Please click on the link below to take a quick 5 minute survey. &nbsp;This survey helps us gather information about the modern day gamer community and adjust our information to better accommodate&nbsp;all&nbsp;gamers. &nbsp; For anyone that wishes to help us grow with a donation, please click <a href="links.html">&quot;HERE&quot;</a>. &nbsp;Thank you!&nbsp;for your contributions no matter the size.</p>

<p>If you wish NOT to become a member;&nbsp;this&nbsp;survey has NO Obligation of joining.</p>

<p>If you wish to become a Flyin Portman Member the first step is to the complete the survey link below. &nbsp; This survey is considered a pre-application of interest. &nbsp;By filling out this survey this DOES NOT guarantee you a membership with Flyin Portman. &nbsp;Near the end of the survey you will see an option to leave your best contact method via email, phone, or &quot;Line&quot; ID. &nbsp;We accept members in the method of a first come, first serve basis upon completing this Survey.</p>

<p>It is FREE to join our Flyin Portman Organization! &nbsp;With specific donation denominations we will supply each member with extended access to the website, reviews, chats, GamerTags, merchandising purchasing programs, and more. &nbsp;As we continue to grow as an organization, we will be offering other perks &amp; benefits. &nbsp;&nbsp;</p>

<p></p>

<div id="surveyLink">
<h1><a href="https://docs.google.com/forms/d/1loxcC5DxhWwC3Y90ji1yvRbzpVHO-hqnHZXPXcP9m8M/viewform">Click here to take the Survey.</a></h1>
</div>
</div>
</div>

<div id="sidebar">
<nav><a href="index.php"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.php"><img alt="Join Us" id="nav_join" src="images/nav_join_active.png" width="250" /></a></nav>

<nav><a href="contact.php"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.php" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>

<div id="surveyLink"></div>
</body>
</html>