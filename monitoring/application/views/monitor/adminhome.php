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

<!--<script type="text/javascript" src="assets/js/hostlist.js"></script>-->
   <script type="text/javascript" language="javascript">
          
           setTimeout('window.location.reload();', 10000);
     </script>

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
       <div id="hosts_info">
           
       </div>

     </div>
    <!--end circles-->
    <div id="image-slider">
     <label id="use_label">User</label>
     <label id="hos_label">Host</label>
     <label id="sta_label">Status</label>

     <?php
      for($i=0;$i<sizeof($users);$i++)
          {
          ?>

       
         <div id="userinfo">
           
             <label id="holabel"><?php echo $users[$i];?></label>

                    
         </div><!--end of use-->

         
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
                  <div id="hosts<?php echo $j;?>">
                    <?php 
                   

                    echo $list[$j]->hosts;

                    if((!strcmp($host_status[$list[$j]->hosts],"pending"))||(!strcmp($host_status[$list[$j]->hosts],"up")))
                      {



                        echo "<script>document.getElementById('hosts$j').style.backgroundColor='lightgreen'</script>";
                        echo "<script>document.getElementById('hosts$j').style.padding='10px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.marginBottom='10px'</script>";
                          echo "<script>document.getElementById('hosts$j').style.marginLeft='60px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.height='10px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.width='50px'</script>";
                      }

                    else{

                      echo "<script>document.getElementById('hosts$j').style.backgroundColor='#ff9999'</script>";
                      echo "<script>document.getElementById('hosts$j').style.padding='10px'</script>";
                      echo "<script>document.getElementById('hosts$j').style.marginBottom='10px'</script>";
                      echo "<script>document.getElementById('hosts$j').style.marginLeft='60px'</script>";
                      echo "<script>document.getElementById('hosts$j').style.height='10px'</script>";
                      echo "<script>document.getElementById('hosts$j').style.width='50px'</script>";

                    }




                   ?>
                  </div>
                </td>
                <td>
                   <div id="status<?php echo $j;?>">
                    <?php echo $host_status[$list[$j]->hosts];

                    if((!strcmp($host_status[$list[$j]->hosts],"pending"))||(!strcmp($host_status[$list[$j]->hosts],"up")))
                      {



                        echo "<script>document.getElementById('status$j').style.backgroundColor='lightgreen'</script>";
                        echo "<script>document.getElementById('status$j').style.padding='10px'</script>";
                        echo "<script>document.getElementById('status$j').style.marginBottom='10px'</script>";
                        echo "<script>document.getElementById('status$j').style.marginLeft='40px'</script>";
                        echo "<script>document.getElementById('status$j').style.height='10px'</script>";
                        echo "<script>document.getElementById('status$j').style.width='30px'</script>";

                      }

                    else{

                      echo "<script>document.getElementById('status$j').style.backgroundColor='#ff9999'</script>";
                      echo "<script>document.getElementById('status$j').style.padding='10px'</script>";
                      echo "<script>document.getElementById('status$j').style.marginBottom='10px'</script>";
                      echo "<script>document.getElementById('status$j').style.marginLeft='40px'</script>";
                      echo "<script>document.getElementById('status$j').style.height='10px'</script>";
                      echo "<script>document.getElementById('status$j').style.width='30px'</script>";

                    }





                    echo "&nbsp";//echo "<meter value='1'></meter>";?>
                  </div>
                </td>
              </tr>
              <?php
                 }
                }
               ?>

           </table>
       </div>
         

    
      <?php } ?>
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
