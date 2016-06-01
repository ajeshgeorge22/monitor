<?php
$username = $this->session->userdata['username'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Monitor</title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/skin.css');?>" />

<!--<script type="text/javascript" src="assets/js/hostlist.js">

</script>-->
    

</head>
<body class="home">
<div id="wrap">
  <div id="header"> <img src="<?php echo base_url('assets/images/logo.jpg');?>"/>
    <div id="nav">
      <ul class="menu">
        <li class="current_page_item"><a href="<?php echo site_url('monitor/adminhome'); ?>">Home</a></li>
        <li><a href="<?php echo site_url('monitor/edit'); ?>">Edit</a></li>
        <li><a href="<?php echo site_url('monitor/logout'); ?>">Logout</a></li>
      </ul>
    </div>
    <!--end nav-->
  </div>
  <!--end header-->
  <div id="featured-section">
   
    <div id="circles">
     <form method="post" >
     <div id="add_user">
        <label id="holabel">Add User:</label>
        <input type="text" name="username"  placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="checkbox" name="admin" value="admin"/>Admin
        <input id="submit" class="submit" type="submit" name="submit" value="Add" />
     </div>

     <div id="add_host">
      <label id="holabel">Add Host:</label>
      <select name="dropdown" onchange="">
            <option selected>select user</option>
            
             <?php 
                 for($i=0;$i<sizeof($users);$i++)
                   {

                   
            ?>
             <option value="<?php echo $users[$i];?>"><?php echo $users[$i];?></option>
            
            <?php }?>
      </select>
      <input type="text" name="host" placeholder="hostname"/>
      <input id="submit" class="submit" type="submit" name="submit" value="Add" />
      </div>
      <span class="error"><?php echo "<br>";echo $err;?></span>
     </form>
     </div>
    <!--end circles-->
    <div id="image-slider">
       <form method="post">
      <label id="use_label">User</label>
     <label id="hos_label">Remove</label>
     <label id="sta_label">Host</label>
     <label id="hos_label">Remove</label>
    
     <?php
      for($i=0;$i<sizeof($users);$i++)
          {
          ?>
          
         <table>
         <tr>
         <td>
         <div id="userinfo">
           
             <label id="holabel"><?php echo $users[$i];?></label>
             
                    
         </div><!--end of use-->
         </td>
         <td>
         <div id="close">
           
           <input type="checkbox" name="deluser" value="<?php echo $users[$i];?>"/>
         </div>
         </td>
          <td>
            <div id="del">
             <input id="submit" class="submit" type="submit" name="submit" value="delete" />
         </div>
          </td>
         </tr>
         </table>
       <div>
         
          <div id="ho_inf">
           <table>
              
              <?php
               for($j=0;$j<sizeof($list);$j++)
                   { 
                      if(!strcmp($list[$j]->user,$users[$i]))

                        {

              ?>
              <tr>
                <td>
                  <div id="hosts">
                    <?php echo $list[$j]->hosts;?>

                  </div>
                </td>
                <td>
                   <div id="status">
                    <input type="checkbox" name="delhost" value="<?php echo $list[$j]->hosts;?>" id="delete"/>
                  </div>
                </td>

              </tr>

              <?php
                 }
                }
               ?>

           </table>
       </div>
         <tr>
        <td>
         
         </td>
         </tr>
         <hr>

    
      <?php } ?>
      
      </form>
    </div>
    <!--end image-slider-->
  </div>
  <!--end featured-section-->
  <div id="frontpage-main">
    <div id="frontpage-content">

    </div>
    <!--end frontpage-content-->
    <div id="frontpage-sidebar">

    <!--end frontpage-sidebar-->
  </div>
  <!--end frontpage-main-->
  <div id="footer">
    <p class="copyright">Copyright &copy;  All Rights Reserved</a></p>
  </div>
  <!--end footer-->
</div>
<!--end wrap-->
</body>
<div class="cache-images"><img src="images/red-button-bg.png" width="0" height="0" alt="" /><img src="images/black-button-bg.png" width="0" height="0" alt="" /></div>
<!--end cache-images-->
</html>
<?php



?>
