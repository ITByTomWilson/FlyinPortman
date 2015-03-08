<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
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
<div>
<h1><img src="images/members_quarters_title.png" height="50" width="400" alt="About Us"></h1>
<h1><?php echo 'Welcome ' . $_SESSION['firstname'] . '! Your rank is ' . $_SESSION['rank'] . '.';?></h1>
	<h1><?php
		echo $_SESSION['loginmessage'];
	?></h1>

</div>

<div id="houses">
<ul>
	<li><a href="House_of_Microsoft.php"><img alt="Microsoft_House" height="140" src="images/microsofthouse.png" width="120" /></a></li>
	<li><a href="House_of_Sony.php"><img alt="Sony_House" height="140" src="images/sonyhouse.png" width="120" /></a></li>
	<li><a href="House_of_Nintendo.php"><img alt="Nintendo_House" height="140" src="images/nintendohouse.png" width="120" /></a></li>
	<li><a href="House_of_Portable.php"><img alt="Portable_House" height="140" src="images/housePortable.png" width="120" /></a></li>
	<li><a href="House_of_Computer.php"><img alt="Computer_House" height="140" src="images/computerhouse.png" width="120" /></a></li>
	<li>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick" /> <input name="hosted_button_id" type="hidden" value="NVA2WMYD7UHWC" />
	<table>
		<tbody>
<br>All New Members Please click the following link for a Welcome Pack <br><a href="welcomepack.pdf">Flyin Portman Welcome Pack</a>
<br>All Members please click the following link for Privacy Protection File <br><a href="PrivacyPolicy.pdf"> Privacy Policy </a>


			<tr>

				<td><input name="on0" type="hidden" value="Merchandising" />Any member looking to donate or purchase merchandise (membership) please contact <a href="mailto:admin@flyinportman.com">Admin</a> first to verify proper inventory levels.<br><br></td>
			</tr>
			<tr>
			<td><select name="os0"><option value="Donation (Membership)">Donation (Membership) $10.00 USD</option><option value="Donation Denomination">Donation Denomination $5.00 USD</option><option value="Shirt (Pickup)">Shirt (Pickup) $15.00 USD</option><option value="Shirt (w/ Delivery)">Shirt (w/ Delivery) $20.00 USD</option><option value="2 Shirts (w/ Delivery)">2 Shirts (w/ Delivery) $35.00 USD</option> </select></td>
			</tr>
			<tr>
				<td><input name="on1" type="hidden" value="Sizes" />Sizes</td>
			</tr>
			<tr>
				<td><select name="os1"><option value="Small">Small</option><option value="Medium">Medium</option><option value="Large">Large</option><option value="Extra Large">Extra Large</option><option value="2XL">2XL</option><option value="3XL">3XL</option> </select></td>
			</tr>
		</tbody>
	</table>
	<input name="currency_code" type="hidden" value="USD" /> <input alt="PayPal - The safer, easier way to pay online!" border="0" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" type="image" /> <img alt="" border="0" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" /></form>
	
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="UJE4XB5JLP9N6">
<table>
<tr><td><input type="hidden" name="on0" value="Event Promotional Merchandise">Event Promotional Merchandise</td></tr><tr><td><select name="os0">
	<option value="Donation Denomination">Donation Denomination $5.00 USD</option>
	<option value="Shirt (Globe)">Shirt (Globe) $20.00 USD</option>
	<option value="Shirt 2x Promotion (Globe)">Shirt 2x Promotion (Globe) $30.00 USD</option>
</select> </td></tr>
<tr><td><input type="hidden" name="on1" value="Sizes">Sizes</td></tr><tr><td><select name="os1">
	<option value="Small">Small </option>
	<option value="Medium">Medium </option>
	<option value="Large">Large </option>
	<option value="Extra Large">Extra Large </option>
	<option value="2XL">2XL </option>
	<option value="3XL">3XL </option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

	
	</li>
</ul>
</div>
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