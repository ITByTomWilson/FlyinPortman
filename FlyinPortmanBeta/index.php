<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
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
        </script><!-- Start WOWSlider.com HEAD section --><!-- add to the <head> of your page -->
	<link href="engine0/style.css" rel="stylesheet" type="text/css" /><!--script type="text/javascript" src="engine0/jquery.js"></script--><!-- End WOWSlider.com HEAD section -->
</head>
<body>
<div id="container">
<div id="header"><a href="index.html"><img alt="Home" height="200" src="images/header.png" width="960" /></a></div>

<div id="top_bar">
<form id="login" action="php/login.php" method="post"><label for="userid4">User ID:</label> <input class="required" id="userid4" name="userid" type="text" /> &nbsp; &nbsp; &nbsp; <label for="password">Password:</label> <input class="required" id="password" name="password" type="password" /> &nbsp; &nbsp; &nbsp; <input id="submit" name="submit" type="submit" value="Submit" /></form>

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
<h1><img alt="About Us" height="50" src="images/home_title.png" width="400" /></h1>

<h3>Flyin Portman History!</h3>

<p>The actual name of &ldquo;Flyin Portman&rdquo; represents an actual ghost ship that disappeared with the Bermuda Triangle named &ldquo;Mary Celeste&rdquo;.</p>

<p>We establish this organization in 2012 with a group of strangers (Now Friends!) that decided to escape reality of the work life, parenting, and of course everyday stress events. Working together bringing a few ideas together. We had the exact same vision but so many different approaches of accomplishing the same vision. But of course, up until now the vision was only just that....a vision.<br />
<br />
Within this past few years, we have worked together to bring this vision to life. Without hesitation we took the initiative to share and to spread this vision to our family, friends, and even co-workers. This idea quickly grew with the little support we received and the structure started to take this vision and create reality. August of 2014 our vision came alive and was developed. We currently represent a community of prestige gamers that &ldquo;love&rdquo; the gaming experience of playing online together no matter the platform, console, or time. You heard it correctly we have designed a system where it brings gamers from all over the world no matter the platform, console, or time!<br />
<br />
We wanted to leave a little internal mystery of our prestige organization to allow our members to relate to. After a year of researching and marketing we decided to follow a unique story about an actual ghost ship that disappeared within the Bermuda Triangle named &ldquo;Mary Celeste&rdquo;. After reading and understanding this unique story, we decided this was the direction we wanted to head! Together as members, together as an organization, but importantly together as a Prestige Gamer Community... the Flyin Portman was born!<br />
<!-- Start WOWSlider.com BODY section --><!-- add to the <body> of your page --></p>

<div id="wowslider-container0">
<div class="ws_images">
<ul>
	<li><img alt="gamers" id="wows0_0" src="data0/images/gamers.jpg" title="gamers" /></li>
	<li><a href="http://wowslider.com/vf"><img alt="full screen slider" id="wows0_1" src="data0/images/gamers2.jpg" title="gamers2" /></a></li>
	<li><img alt="gamers3" id="wows0_2" src="data0/images/gamers3.jpg" title="gamers3" /></li>
</ul>
</div>

<div class="ws_bullets">
<div><a href="#" title="gamers"><img alt="gamers" src="data0/tooltips/gamers.jpg" />1</a> <a href="#" title="gamers2"><img alt="gamers2" src="data0/tooltips/gamers2.jpg" />2</a> <a href="#" title="gamers3"><img alt="gamers3" src="data0/tooltips/gamers3.jpg" />3</a></div>
</div>

<div class="ws_shadow"></div>
</div>
<script type="text/javascript" src="engine0/wowslider.js"></script><script type="text/javascript" src="engine0/script.js"></script><!-- End WOWSlider.com BODY section --></div>
</div>

<div id="sidebar">
<nav><a href="index.html"><img alt="Home" id="nav_home" src="images/nav_home_active.png" width="250" /></a></nav>

<nav><a href="join.html"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.html"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.html" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>

</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>
</body>
</html>