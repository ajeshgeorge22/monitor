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
          function report(host) 
          {
              
             //alert(host);
             
            //var result = "<?php echo 'nagios_get_hosts_status()';?>";
              /*$.ajax({
                url: 'monitoring.com/webservice/status.php',
                type: 'POST',
                data: 'hostname='+host,
                success: function() 
                 {
                  console.log("Data sent!");
                }
              });*/

          }
           setTimeout('window.location.reload();', 10000);
     </script>

</head>
<body class="home">
<div id="wrap">
  <div id="header"> <img src="<?php echo base_url('assets/images/logo.jpg');?>"/>
    <div id="nav">
      <ul class="menu">
        <li class="current_page_item"><a href="<?php echo site_url('monitor/home'); ?>">Home</a></li>
        <li><a href="<?php echo site_url('monitor/contact'); ?>">Contact</a></li>
        <li><a href="<?php echo site_url('monitor/logout'); ?>">Logout</a></li>
      </ul>
    </div>
    <!--end nav-->
  </div>
  <!--end header-->
  <div id="featured-section">
   
    <div id="circles"><!--
       <div id="select">
          <label>hosts</label>
          <select name="dropdown" onchange="report(this.value)">
            <option selected>select</option>
             <?php 
                 for($i=0;$i<sizeof($list);$i++)
                   {
                     //echo $list[$i]->user;
                     if(!strcmp($list[$i]->user,$username)) 
                     {

                  ?>    
                  <option value="<?php echo $list[$i]->hosts;?>"><?php echo $list[$i]->hosts;?></option>
             <?php
                
                } 
               }
              ?>

          </select>
       </div>-->
       <div id="hosts_info">
           <table>
              <tr>
                 <td>
                    <label id="hlabel">Hosts</label>
                 </td>
                 <td>
                    <label id="slabel">Status</label>
                 </td>
              </tr><?php //var_dump($host_status);?>
              <?php
               for($j=0;$j<sizeof($list);$j++)
                   { 


              ?>
              <tr>
                <td>
                  <div id="hosts<?php echo $j;?>">
                    <?php echo $list[$j]->hosts;

                    if((!strcmp($host_status[$list[$j]->hosts],"pending"))||(!strcmp($host_status[$list[$j]->hosts],"up")))
                      {



                        echo "<script>document.getElementById('hosts$j').style.backgroundColor='lightgreen'</script>";
                        echo "<script>document.getElementById('hosts$j').style.padding='10px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.margin='10px'</script>";
                          echo "<script>document.getElementById('hosts$j').style.marginLeft='60px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.height='10px'</script>";
                        echo "<script>document.getElementById('hosts$j').style.width='50px'</script>";
                      }

                    else{

                      echo "<script>document.getElementById('hosts$j').style.backgroundColor='#ff9999'</script>";
                      echo "<script>document.getElementById('hosts$j').style.padding='10px'</script>";
                      echo "<script>document.getElementById('hosts$j').style.margin='10px'</script>";
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
                        echo "<script>document.getElementById('status$j').style.margin='10px'</script>";
                        echo "<script>document.getElementById('status$j').style.marginLeft='40px'</script>";
                        echo "<script>document.getElementById('status$j').style.height='10px'</script>";
                        echo "<script>document.getElementById('status$j').style.width='30px'</script>";

                      }

                    else{

                      echo "<script>document.getElementById('status$j').style.backgroundColor='#ff9999'</script>";
                      echo "<script>document.getElementById('status$j').style.padding='10px'</script>";
                      echo "<script>document.getElementById('status$j').style.margin='10px'</script>";
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
               ?>

           </table>
       </div>

     </div>
    <!--end circles-->
    <div id="image-slider">
     <label id="hostlabel">Host</label>
     <label id="servlabel">Service</label>
     <label id="statlabel">Status</label>
     <?php
      for($j=0;$j<sizeof($list);$j++)
          {
          ?>

       <div>
         <div id="hos">
           
             <label id="holabel"><?php echo $list[$j]->hosts;?></label>

                     <?php

                     $servlist[$j]=array_keys($services[$list[$j]->hosts]);
                     $statuslist[$j]=array_values($services[$list[$j]->hosts]);
                     
                  ?>
         </div>

         <div id="service">
           
           <?php
               for($q=0;$q<sizeof($services[$list[$j]->hosts]);$q++)
               {  ?>
                 <div id="list<?php echo$j;echo $q;?>">
                <table>
                <tr>
                
                <td>
                  <div id="ser<?php echo $j;echo $q;?>">
                <?php
                     
                     
                echo $servlist[$j][$q];echo "&nbsp";echo "&nbsp";echo "&nbsp";
                ?>
              </div>
              </td>
              <td>
                <div id="lis<?php echo $j;echo $q;?>">
               <?php
                if(!strcmp($list[$j]->hosts,$statuslist[$j][$q]["host_name"]))
                   {

                       if(!strcmp($servlist[$j][$q],$statuslist[$j][$q]["description"]))
                         {

                           if($statuslist[$j][$q]["status"]==16)
                             {



                               echo "<script>document.getElementById('ser$j$q').style.backgroundColor='#ff9999'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.padding='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.margin='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.height='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.width='120px'</script>";


                               echo "<script>document.getElementById('lis$j$q').style.backgroundColor='#ff9999'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.padding='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.margin='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.height='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.width='500px'</script>";
                             }
                             else {

                               echo "<script>document.getElementById('ser$j$q').style.backgroundColor='lightgreen'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.padding='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.margin='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.height='10px'</script>";
                               echo "<script>document.getElementById('ser$j$q').style.width='120px'</script>";

                               echo "<script>document.getElementById('lis$j$q').style.backgroundColor='lightgreen'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.padding='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.margin='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.height='10px'</script>";
                               echo "<script>document.getElementById('lis$j$q').style.width='500px'</script>";



                             }

                           //echo "<meter value='1'></meter>";

                           echo $statuslist[$j][$q]["plugin_output"];
                         }


                   }

                echo "<br/>";
                ?>
              </div>
              </td>
            </tr>
          </table>
                </div>
               <?php
               }
                  ?>
         </div><!--end of service-->

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
