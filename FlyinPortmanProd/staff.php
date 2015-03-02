<!DOCTYPE html>
<?php
include "php/inc_loginCheck.php";

?>
<html>
<meta charset='utf-8'>
  <title>Flyin Portman</title>
  <link rel="stylesheet" href="css/style.css">
    
  <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/tooltip.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/tooltip.css">
    <script>
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
    <div id="header">
        <a href="index.html"><img src="images/header.png" height="200" width="960" alt="Home"></a>
    </div>

  <div id="top_bar">
      <?php
		include "php/inc_loginHeader.php"
	?>
      <ul>
            
       <li class="tooltip" onmouseover="tooltip.pop(this, 'Facebook', {position:2})"><a href="https://www.facebook.com/groups/flyinportman/"><img src="images/icon_fb.png" alt="Like us on Facebook."></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'Twitter', {position:2})"><a href="https://twitter.com/FlyinPortman"><img src="images/icon_twitter.png" alt="Follow us on Twitter."></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'Google Plus', {position:2})"><a href="#gplus" id="gplus"><img src="images/icon_gplus.png" alt="Add us to your circles."></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'YouTube', {position:2})"><a href="#youtube" id="youtube"><img src="images/icon_youtube.png" alt="Our YouTube channel."></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'Email', {position:2})"><a href="contact.php"><img src="images/icon_email.png" alt="Contact Us"></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'Search', {position:2})"><a href="search.php"><img src="images/icon_search.png" alt="Search"></a></li>

        <li class="tooltip" onmouseover="tooltip.pop(this, 'FAQ', {position:2})"><a href="faq.php"><img src="images/icon_faq.png" alt="Frequently Asked Questions"></a></li>
        </ul>
        
        </div>
 
  <div id="content">
       
    
    <div>
      <h1><img src="images/staff_title.png" height="50" width="400" alt="About Us"></h1>
      </div>
  </div>
    
    <div id="sidebar">
        <nav><a href="index.php"><img src="images/nav_home.png" width="250" id="nav_home" alt="Home"></a></nav>

        <nav><a href="join.php"><img src="images/nav_join.png" width="250" id="nav_join" alt="Join Us"></a></nav>

        <nav><a href="contact.php"><img src="images/nav_contact.png" width="250" id="nav_contact" alt="Contact Us"></a></nav>

        <nav><a href="links.php" id="nav_links"><img src="images/nav_links.png" width="250" alt="Supported Links"></a></nav>

        <nav> <a href="quarters.php" id="nav_quarters"><img  src="images/nav_quarters.png" width="250" alt="Members Quarters"></a></nav>

        <nav><a href="hr.php" id="nav_hr"><img src="images/nav_hr.png" width="250" alt="Human Resources"></a></nav>

        <nav><a href="staff.php" id="nav_sm"><img src="images/nav_sm_active.png" width="250" alt="Staff Management"></a></nav>

        <nav><a href="admin.php" id="nav_admin"><img src="images/nav_admin.png" width="250" alt="Admin"></a></nav>
        
    </div>
    
    <div id="footer">
       <img src="images/footer.png" alt="footer">
    </div>

</div>
 
</body>
</html>
