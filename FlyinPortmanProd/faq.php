<!DOCTYPE html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	
	<title>Flyin Portman</title>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/tooltip.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css" /><script src="js/jquery-1.9.1.min.js" type="text/javascript"></script><script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script src="js/tooltip.js" type="text/javascript"></script><script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
	<style type="text/css">h4
        {
            cursor: pointer;
        }
        .answer
        {
            margin-left: 25px;
        }
	</style>
	<script type="text/javascript">
        $(document).ready(function () {
            $('.answer').hide();
            $('.main h4').toggle(function() {
                $(this).next('.answer').fadeIn();
                $(this).addClass('close');
            },
            function() {
                $(this).next('.answer').fadeOut();
                $(this).removeClass('close');
            }); // end of toggle()
        }); // end of ready()
</script><script>
  		$(document).ready(function() {
    		$("#youtube").click(function() {
    			alert('Our YouTube channel is coming soon. Stay tuned!');
    		}); // end click
    		$("#gplus").click(function() {
    			alert('Coming soon.');
    		}); // end click
    		$('#nav img').each(function() {
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
<h3><img alt="Frequently Asked Questions" height="50" src="images/faq_title.png" width="400" /></h3>

<div class="main">
<h4>What is Flyin Portman?</h4>

<div class="answer">
<p>Flyin Portman is an Organized Online Gaming Community. We have designed a website where we have taken aspects of local dating sites and the professionalism of specific social networking systems and combined them together to form a group of online gamers with same scouted attributes.</p>
</div>

<h4>When did the group start?</h4>

<div class="answer">
<p>The group originally started October 2013.</p>
</div>

<h4>How do I become a member?</h4>

<div class="answer">
<p>Becoming a member is simple. Click on the Join Us link, Take the customized survey. At the end of the Survey there is section where you need to leave the best contact information. After leaving your information we will send you corresponding information about further advancement.</p>
</div>

<h4>Does it cost anything to be a member?</h4>

<div class="answer">
<p>Cost of membership is FREE! If you would like to take advantage of other features of the organization we have multiple tier membership depending on denominations of donations.</p>
</div>

<h4>How old must I be to be a member?</h4>

<div class="answer">
<p>18 years old is the minimum age requirement due to current legal agreements we have with current and future partners.</p>
</div>

<h4>What platforms or games does your organization require to play on?</h4>

<div class="answer">
<p>We have designed a system where it is possible to have multi platform and multi game without specific times of playing.</p>
</div>

<h4>What makes this organization different than any other guild, clan, or gaming organization?</h4>

<div class="answer">
<p>a.) we constructed a well organization structure of members where we can successfully support up to if not limited to 1,000 members. b.) we scout and screen all players with specific attributes to make sure each person that is a member are dedicated in team support. c.) we have open door communication. If you want to communicate with any one at any time within the organization including the CEO, Admin, or any leader we welcome it. d.) we are currently working on outside recognition including but not limited to volunteer work in local communities. e.) we have created intense marketing research before launching with a well organized and structured survey. We use this information to generate future expansion.</p>
</div>

<h4>How are internal &amp; external problems dealt with?</h4>

<div class="answer">
<p>we have taken multiple business proven structures of modern day corporate america and redesigned them for internal advantages. With the addition of open door policy which allows any member to talk with any member of leadership including CEO.</p>
</div>

<h4>Is this group of stranger that have been scouted experienced players?</h4>

<div class="answer">
<p>As we grow as a organization multiple members individually may be more experienced in specific platforms, games, or technology. we have selected individuals not solely based on their individual experience but more on the gaming style.</p>
</div>

<h4>If I am interested in joining and I follow all proper steps how long does it take to become a member? I heard it was difficult.</h4>

<div class="answer">
<p>The time frame of becoming a member varies. If a player is recommended by another player the time frame will be quicker.. Typically we try to recruit members on a monthly basis. The more a potential candidate exposes themselves willingly the easier this person will be recognized. We scout players on a daily basis so the actual time frame can be 30 days average. And NO it is not difficult!</p>
</div>

<h4>Since I do not know anyone currently can I reach out to someone immediately for questions?</h4>

<div class="answer">
<p>Yes, feel free to contact us through the provided email links throughout the website. It would be our pleasure to supply any one with any additional information.</p>
</div>
</div>
</div>

<div id="sidebar">
<nav><a href="index.php"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.php"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.php"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.php" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>
</body>
</html>