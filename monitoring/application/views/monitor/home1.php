<?php



 $host_status;
 $service_status;
 $hosts;
 $i=0;$k=0;$j=0;
 $hosval;
 $hostvalue;
 $hostname;
 $value;
 $service;
 $val;
 $servlist;
 $statuslist;
 $list;
 $host_count=0;
 $stat;
 $slist;
 $stalist;
 $sl;
 $hoser=0;
 $hostat=0;$l=0;
 $sercount;
 $g=0;


 $nagios_service_status = ['1' => 'pending', '2' => 'ok', '4' => 'warning', '8' => 'unknown', '16' => 'critical' ];
 $nagios_host_status = [ '1' => 'pending', '2' => 'up', '4' => 'down' , '8' => 'unreachable'];




function nagios_get_hosts_status()

  {

      $url="http://10.2.0.226/nagios/cgi-bin/statusjson.cgi?query=hostlist&hoststatus=up+down+unreachable+pending";
     $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($curl, CURLOPT_USERPWD, "nagiosadmin:qburst");
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $count;$i=0;$j=0;$k=0;
   $page = curl_exec($curl);
   //print_r($page);

   $json = json_decode($page, true);

   GLOBAL $hostname,$value,$hostvalue;

   foreach($json["data"]["hostlist"]as $hostname => $value)
      {
         GLOBAL $hosts,$host_count;

        $hosts[$i]=$hostname;
         //var_dump($hosts);
        //echo $hosts[$i];
        $i=$i+1;
        $host_count=$i;
        //var_dump($host_count);
       //print($hostname);

       nagios_get_services_status($hostname);
      }

      foreach($json["data"]["hostlist"] as $hostvalue)
       {
           GLOBAL $host_status,$nagios_host_status;
           $host_status[$k]=$nagios_host_status[$hostvalue];


          //echo $host_status[$k];
          $k++;
        }



  if(curl_errno($curl)) // check for execution errors
   {
	echo 'Scraper error: ' . curl_error($curl);
	exit;
   }

  curl_close($curl);



}

function nagios_get_services_status($hostname)

  {
      $p=0;GLOBAL $service,$val,$servlist,$statuslist,$list,$host_count,$stat,$slist,$stalist,$sl,$hoser,$hostat,$sercount;
      $t=0;$r=0;$k=0;

      $ur="http://10.2.0.226/nagios/cgi-bin/statusjson.cgi?query=servicelist&details=true&hostname=$hostname&servicestatus=ok+warning+critical+unknown";

     $cur = curl_init();
      curl_setopt($cur, CURLOPT_URL, $ur);
   curl_setopt($cur, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($cur, CURLOPT_USERPWD, "nagiosadmin:qburst");
   curl_setopt($cur, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   $pag = curl_exec($cur);
   //print_r($page);
   $jso = json_decode($pag, true);

   foreach($jso["data"]["servicelist"] as $service)
    {
       $servlist[$hoser++]=array_keys($service);
       $statuslist[$t]=array_values($service);

      //var_dump($statuslist);$t++;


    }

   //var_dump($servlist);
    for($p=0;$p<$host_count;$p++)
    {
       $list[$p]=$servlist[$p];
       //var_dump($host_count);

    }
    for($p=0;$p<$host_count;$p++)
    {
       $sercount[$p]=sizeof($servlist[$p]);$g++;


    }

    foreach($statuslist as $stalist => $sl[$hostat++])
    {
       $slist[$p]=$stalist;
      // var_dump($sl);$p++;
    }


  if(curl_errno($cur)) // check for execution errors
   {
	echo 'Scraper error: ' . curl_error($cur);
	exit;
   }

  curl_close($cur);


}






//$check = new Monitor;

nagios_get_hosts_status();
//  var_dump($nagios_hosts);

//var_dump($sl);

//var_dump($sercount);
//var_dump($list);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Monitor</title>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link type="text/css" rel="stylesheet" href="styles/skin.css" />
    <script type="text/javascript">

           setTimeout('window.location.reload();', 5000);
     </script>

</head>
<body class="home">
<div id="wrap">
  <div id="header"> <img src="images/logo.jpg"/>
    <div id="nav">
      <ul class="menu">
        <li class="current_page_item"><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </div>
    <!--end nav-->
  </div>
  <!--end header-->
  <div id="featured-section">

    <div id="circles">
       <div id="hosts_info">
           <table>
              <tr>
                 <td>
                    <label id="hlabel">Hosts</label>
                 </td>
                 <td>
                    <label id="slabel">Status</label>
                 </td>

              </tr>
              <?php
               for($j=0;$j<$host_count;$j++)
                   {


              ?>
              <tr>
                <td>
                  <div id="hosts<?php echo $j;?>">
                    <?php echo $hosts[$j];

                    if((!strcmp($host_status[$j],"pending"))||(!strcmp($host_status[$j],"up")))
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
                    <?php echo $host_status[$j];

                    if((!strcmp($host_status[$j],"pending"))||(!strcmp($host_status[$j],"up")))
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
     <label id="servlabel">Services</label>
     <?php
      for($j=0;$j<$host_count;$j++)
          {
          ?>

       <div>
         <div id="hos">
           <?php echo "Host:";

                  ?>
           <?php echo $hosts[$j];
                  ?>
         </div>

         <div id="service">

           <?php
               for($q=0;$q<$sercount[$j];$q++)
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
                if(!strlen($hosts[$j],$sl[$l][$j]["host_name"]))
                   {

                        //echo $sl[$l][$j]["host_name"];


                       if(!strlen($servlist[$j][$q],$sl[$l][$j][$q]["description"]))
                         {//echo $sl[$l][$j]["host_name"];

                           if($sl[$l][$q]["status"]==16)
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

                           //echo $sl[$j]["description"];
                           echo $sl[$l][$q]["plugin_output"];
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
         </div>

      </div>
      <?php $l++;} ?>
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
