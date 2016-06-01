<!DOCTYPE html>
<html lang="en">
<head>
<title>monitoring | Contact</title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"/>
 
   <script type="text/javascript" language="javascript">
          
           setTimeout('window.location.reload();', 60000);
     </script>

</head>
<body class="page">
<div id="wrap">
  <div id="header"> <img src="<?php echo base_url('assets/images/logo.jpg');?>"/>
    <div id="nav">
      <ul class="menu">
        <li><a href="<?php echo site_url('monitor/home');?>">Home</a></li>
        <li class="current_page_item"><a href="<?php echo site_url('monitor/contact'); ?>">Contact</a></li>
        <li><a href="<?php echo site_url('monitor/logout'); ?>">Logout</a></li>
      </ul>
    </div>
    <!--end nav-->
  </div>
  <!--end header-->
  <div class="page-headline">Contact Us</div>
  <div id="main">
    <div id="contact-details">
      <h3 class="title">Get In Touch</h3>
      <div class="post">
        <p>For further queries please contact us directly via  email.</p>
      </div>
      <h3>Contact Details</h3>    
      <h4>Email: <span>support@qburst.com</span></h4>
    </div>
    <!--end contact-details-->
    <div id="contact-form-container">
      <form id="tick_form" method="post" action="">
        <fieldset>
         
        </fieldset>
        <fieldset>
           <h3 class="title">Create Ticket</h3>
           <input  id="text_sub" type="text" name="subject" value="" placeholder="subject"/>
          <textarea id="text_des" rows="10" cols="40" name="description" placeholder="description"></textarea>
          <br/>
          <input id="sub_submit" class="submit" type="submit" name="submit" value="Create &raquo;" />
        </fieldset>
      </form>
    </div>
    <!--end contact-form-container-->
  </div>
  <!--end main-->
  <div id="footer">
    <p class="copyright">Copyright &copy;All Rights Reserved </p>
  </div>
  <!--end footer-->
</div>
<!--end wrap-->
</body>
<div class="cache-images"><img src="images/red-button-bg.png" width="0" height="0" alt="" /><img src="images/black-button-bg.png" width="0" height="0" alt="" /></div>
<!--end cache-images-->
</html>
