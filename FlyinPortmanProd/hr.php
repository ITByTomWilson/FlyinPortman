<!DOCTYPE html>
<?php
include "php/inc_loginCheck.php";

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
	
	<title>Flyin Portman</title>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/tooltip.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css" /><script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script src="js/tooltip.js" type="text/javascript"></script><script>
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
<h1><img alt="Human Resources" height="50" src="images/hr_title.png" width="400" /></h1>

<h3>Terms &amp; Conditions</h3>

<p style="text-align: center; "><span style="font-size:22px;"><strong>Flyin Portman Mentality</strong></span></p>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width: 400px; ">
	<tbody>
		<tr>
			<td><span style="font-size:18px;">1.)</span></td>
			<td><span style="font-size:18px;"><em>&quot;Portman First!&quot;</em></span></td>
		</tr>
		<tr>
			<td><span style="font-size:18px;">2.)</span></td>
			<td><span style="font-size:18px;"><em>Loyalty (Personal)</em></span></td>
		</tr>
		<tr>
			<td><span style="font-size:18px;">3.)</span></td>
			<td><span style="font-size:18px;"><em>Allegiance (Team)</em></span></td>
		</tr>
		<tr>
			<td><span style="font-size:18px;">4.)</span></td>
			<td><span style="font-size:18px;"><em>Integrity</em></span></td>
		</tr>
		<tr>
			<td><span style="font-size:18px;">5.)</span></td>
			<td><span style="font-size:18px;"><em>Nobility</em></span></td>
		</tr>
		<tr>
			<td><span style="font-size:18px;">6.)</span></td>
			<td><span style="font-size:18px;"><em>Gamers Love Online Gaming!</em></span></td>
		</tr>
	</tbody>
</table>

<p><br />
<br />
All members of this organization are individually chosen &amp; scouted for their loyalty, skills, experience, personality and other important characteristics. At Flyin Portman, we follow these ideal visions not only to create a better gaming future, but using these as our core outlook and foundation for the organization. &nbsp;To&nbsp;focus on our behaviors, actions, responses, and overall game interactions to the gamers&rsquo; community as a professional example versus an force of domination. We call this PORTMAN PRIDE. &nbsp;Countless hours have been devoted to create an environment unlike any other gamer organization. You are <strong><em>EXPECTED</em></strong> to respect all current members and all those who you interact with while representing The Flyin Portman. &nbsp;The purpose is and will always be for the &ldquo;Love&rdquo; of online gaming.<br />
<br />
&nbsp;</p>

<p style="text-align: center; "><span style="font-size:24px;"><strong><em>Team Motto:</em></strong></span></p>

<p></p>

<center><span style="font-size:48px;"><strong>W. I. N. G. S.</strong></span></center>

<p></p>

<p></p>

<center><strong><em><span style="font-size:18px;"><span style="color:#800080;">&quot;With&nbsp;Integrity and&nbsp;Nobility&nbsp;as Gamers&nbsp;we Soar&quot;</span></span></em></strong></center>

<p></p>

<p><br />
<br />
<span style="font-size:18px;"><strong>Account Security:</strong></span>&nbsp;Once accepted into organization, all profile (other wise listed in the house) information is considered personal and confidential. Please do not share any other additional information such as log in, passwords, gamer tags, token codes, etc. If you feel someone has hacked into account you are responsible for notifying Admin immediately so we can take immediate action. We will process the claim immediately.</p>

<p><span style="font-size:18px;"><strong>Website Interaction:</strong></span>&nbsp;For any participation in uploading material or content to FlyinPortman.com you are waiving all legal, financials, &amp; royalties that the organization has excepted. This material or content immediately becomes property of Flyin Portman Organization. All rights are subject to our organization for any kind of usage in regards but not limited to: advertising, promoting, marketings, examples, etc. In any reason material is deemed offensive Admin has all rights to delete immediately without notice.<br />
<br />
<span style="font-size:18px;"><strong>Creativity Ideas:</strong></span>&nbsp;Please submit any ideas, comments, or content in an email to Admin department of Flyin Portman. All comments, ideas, and content, will be addressed within 48 hours of submission. The admin division of Flyin Portman encourages everyone to participate in innovation and will never dismiss any idea, comments, or content without review. We constantly strive to better our organization and reward individuals who help us achieve this goal. Please keep in mind that any and all information and/or content submitted to The Flyin Portman organization immediately become the property of The Flyin Portman organization and its administration.</p>

<p><span style="font-size:18px;"><strong>Tiered Donation Benefits:</strong></span>&nbsp; Effective January 1st, 2015. &nbsp;Membership to the Flyin Portman Organization is FREE! &nbsp;This membership will include access to the Gamer Tags, reviews, and other benefits associated with &quot;House of Portable&quot;. A $10 Donation Denomination will supply each member with extended access to the website, reviews, chats, GamerTags, merchandising purchasing programs, and more.&nbsp; <u>All donations will be tracked as independent denominations.</u>&nbsp; These donations will help cover the maintenance, construction, &amp; security of our Web Site &amp; any promotional material. &nbsp;The yearly donation tier leveling may change based on needs of website maintenance and other services any time without notice. &nbsp;For no reason will we increase a tier and ask for the difference in the middle of any membership. Any questions please contact Human Resources.</p>

<p><span style="font-size:18px;"><strong>Refunds:</strong></span>&nbsp;Please note that all purchases, donations, and compensation of any kind for any reason to Flyin Portman and The Flyin Portman organization is NON-REFUNDABLE.<br />
<br />
<span style="font-size:18px;"><strong>Admin &amp; Royalty Event Disclosure:</strong></span> Throughout the year Flyin Portman will be attending multiple functions, events, and promotions. In these circumstance all attendees of the organization must be business ready upon arrival. Business ready includes but not limited to Flyin Portman W.I.N.G.S. shirt or solid black (no print) polo or t-shirt, khaki colored pants or jeans (no holes or stains), along with preferred lanyard.<br />
<br />
<span style="font-size:18px;"><strong>Gentry Event Disclosure:</strong></span> Gentry dress code is based of preference per event. Gentry are not required to have any specific dress code other than lanyard.<br />
<br />
<span style="font-size:18px;"><strong>Profile Name:</strong></span> All names selected for profile must be appropriate for all audiences. For any reason your name is deemed offensive we will ask you to change it. Voluntary name changes are available for up to 30 days after your membership has been approved unless otherwise specified by Flyin Portman Administration. Please refrain from changing your name multiple times. This makes extra work for our admin department and other players will have difficulty determining actual players. Any member that qualifies for only the Free Membership will be required to download an application on their device if permitted called &quot;LINE&quot; for the sole purpose of communication. &nbsp;To make it easier for all members to locate you until we have further expansion of our organization please use your alias or Gamer Tag. &nbsp;If you need assistance or questions please reach out immediately to our Admin Department.<br />
<br />
<span style="font-size:18px;"><strong>Profile &ldquo;Flyin&rdquo; Addition:</strong></span> If you would like to add &ldquo;Flyin&rdquo; to profile name, request must be submitted to Admin prior to adding to profile name. Approval may take up to 48 hours. Please keep in mind that if you choose to add this addition any online handle or form of identification, you will be held to a higher standard in regards to our vision. You will be expected to be an example of what we at the The Flying Portman strive for.<br />
<br />
<span style="font-size:18px;"><strong>Guild creation within and outside of &ldquo;Flyin Portman.&quot;:</strong></span> Under no circumstance shall a member of The Flyin Portman be allowed to create a guild or group within The Flyin Portman without specific and written authorization from the appropriate administration. Members of Flyin Portman may create or join small personal guilds outside of Flyin Portman. Members of Flyin Portman may not create or join guilds that receive compensation or donations of any kind for any reason. Members of Flyin Portman may not create or join any guild that is professional in nature.<br />
<br />
<span style="font-size:18px;"><strong>Promotion or Stretch Assignment:</strong></span>&nbsp;All promotions &amp; stretch assignments are based on commitment and efforts in assistance as needed. &nbsp;All stretch assignments are temporarily based on reports and factual information received through the assignment. &nbsp;<br />
<br />
<span style="font-size:18px;"><strong>Voluntary Dismissal:</strong></span> Many guilds deny re-entry of any applicant, but Flyin Portman understands about life circumstances may require instant change. If you would like to take advantage of the re-entry policy please follow the proper protocol for re-entry. Please submit an email to our HR department with the subject line &ldquo;Honorable Voluntary Discharge&rdquo;. Please state in your email the reason for dismissal.<br />
<br />
<span style="font-size:18px;"><strong>Complaints and Appeals:</strong></span> All complaints &amp; concerns are addressed immediately. All complaints are handled by The Emperor and/or The High King. If a situation requires a meeting between members, a mediator will be appointed. All meetings will be monitored by The Emperor and/or The High King. If a violation results in a dismissal from the organization, but the option to appeal is made available, please email the HR department with the subject line &ldquo;Appeal of Termination&rdquo;. These appeals are re-evaluated to the fullest unless otherwise stated based on termination offense. Please note: The Emperor and/or The High King may designate a senior official to represent their authority at any time for any reason. An organized leadership meeting will be conducted and unanimous decision is needed for re-entry. All appeals will be handled by The Emperor and/or The High King.</p>

<p><span style="font-size:18px;"><strong>Diversity:</strong>&nbsp;</span><span style="font-size:16px;">Please refrain from racism, sexism, ageism, etc within our forums or game play. This type of attitude and mentality is in direct conflict with our vision as an organization and well be dealt with immediately. Violations of our vision in this regard are meet with permanent dismissal from the organization, with no chance for appeal. As a worldwide organization, The Flyin Portman is a place where people of all cultures, genders, ages, etc are welcome. Please do not create a circumstance where this will be questioned.</span><br />
&nbsp;</p>

<p></p>

<p style="text-align: center; "><span style="font-size:22px;"><strong>List of Violations:</strong></span></p>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; width: 300px; ">
	<tbody>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">1.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Unsportsmanlike Conduct</span></em></td>
		</tr>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">2.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Hacking &amp; Cheating</span></em></td>
		</tr>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">3.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Public Forum Complaints</span></em></td>
		</tr>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">4.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Gamer Tag/ ID Duplication</span></em></td>
		</tr>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">5.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Integrity Violation</span></em></td>
		</tr>
		<tr>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><span style="font-size:18px;">6.)</span></td>
			<td style="border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: dotted; border-right-style: dotted; border-bottom-style: dotted; border-left-style: dotted; "><em><span style="font-size:18px;">Other Violations *</span></em></td>
		</tr>
	</tbody>
</table>

<p style="background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgb(255, 255, 255); border-top-width: 5px; border-right-width: 5px; border-bottom-width: 5px; border-left-width: 5px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(211, 211, 211); border-right-color: rgb(211, 211, 211); border-bottom-color: rgb(211, 211, 211); border-left-color: rgb(211, 211, 211); padding-top: 5px; padding-right: 30px; padding-bottom: 5px; padding-left: 30px; text-align: justify; "><br />
<span dir="ltr"><span style="font-size:18px;"><strong>List of Detail Violations Explainations:</strong></span><br />
<span style="font-size:16px;"><em><strong>1.)&nbsp;</strong></em>Unsportsmanlike conduct / Harassing Unsportsmanlike conduct and/or Harassing takes place when an individual uses bad language and/or taunts another players. This also applies to certain gestures and innuendos. Appeal is available. Please note that these are not the ONLY forms of unsportsmanlike conduct and/or harassment. The aforementioned examples are simply used as a guide.<br />
<em><strong>2.)</strong></em> Hacking &amp; Cheating This includes any and all forms of system or code modification that gives an individual an unfair advantage over other players. This also includes but it not limited &quot;glitching&quot; or the exploitation of &quot;bugs&quot;. &quot;Boosting&quot; is also considered a violation under these terms. Please note that these are not the only forms of hacking and cheating. The aforementioned examples are simply used as a guide. Appeal is available.<br />
<em><strong>3.)</strong></em> Public Forum Complaints Any complaints that the Flyin Portman organization receives based on player content or intention will be reviewed. Based on specific actions this can result in instant termination. This is viewed as breaking #.1 vision of Flyin Portman being &ldquo;Portman First&rdquo; Mentality. As members we need to respect other players regardless of emotions &amp; circumstances shown at hand. We need to handle these situations as Adults. These offenses will be discussed and handled on a case-by-case, one on one interaction. Appeal is available.<br />
<em><strong>4.) </strong></em>Gamer Tag/ID Duplication / Sharing NO member is allowed to share his/her gamertag or other online IDs associated with The Flyin Portman without written authorization. No Appeal is available.<br />
<em><strong>5.)</strong></em> Integrity violation Members found in violation of our vision/s will be subject to appropriate disciplinary measures based upon the severity of the offense. Appeal MAY be available based upon offense.<br />
<em><strong>6.)</strong></em> Other violations Any and all violations that do not fall under the aforementioned categories shall be considered &quot;other violations&quot;. These violations are mostly infractions that contrast with the terms and/or the mentality of The Flyin Portman organization. These violations will be reviewed on a case by case basis. Appeal MAY be available based upon offense. Please keep in mind that any and all violations and interpretations of such violations are the sole discretion of The Flyin Portman administration. The aforementioned list of violations should be viewed as a guide line.</span></span></p>

<p style="text-align: center; "><em><span style="font-size:18px;">Locate our group on Facebook &amp; follow us on Twitter: &quot;Flyin Portman&quot;</span></em><br />
&nbsp;</p>
</div>
</div>

<div id="sidebar">
<nav><a href="index.php"><img alt="Home" id="nav_home" src="images/nav_home.png" width="250" /></a></nav>

<nav><a href="join.php"><img alt="Join Us" id="nav_join" src="images/nav_join.png" width="250" /></a></nav>

<nav><a href="contact.php"><img alt="Contact Us" id="nav_contact" src="images/nav_contact.png" width="250" /></a></nav>

<nav><a href="links.php" id="nav_links"><img alt="Supported Links" src="images/nav_links.png" width="250" /></a></nav>

<nav><a href="quarters.php" id="nav_quarters"><img alt="Members Quarters" src="images/nav_quarters.png" width="250" /></a></nav>

<nav><a href="hr.php" id="nav_hr"><img alt="Human Resources" src="images/nav_hr_active.png" width="250" /></a></nav>

<nav><a href="staff.php" id="nav_sm"><img alt="Staff Management" src="images/nav_sm.png" width="250" /></a></nav>

<nav><a href="admin.php" id="nav_admin"><img alt="Admin" src="images/nav_admin.png" width="250" /></a></nav>
</div>

<div id="footer"><img alt="footer" src="images/footer.png" /></div>
</div>
</body>
</html>