<?php

if($_REQUEST['hostname'])
    {
      echo "<script>alert('hiiiiiiiiiiii');</script>";
      nagios_get_hosts_status();
    }


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
    $i=0;

      $url="http://10.2.0.226/nagios/cgi-bin/statusjson.cgi?query=hostlist&hoststatus=up+down+unreachable+pending";
     $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($curl, CURLOPT_USERPWD, "nagiosadmin:qburst");
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $count;$i=0;$j=0;$k=0;
   $page = curl_exec($curl);


   $json = json_decode($page, true);

   GLOBAL $hostname,$value,$hostvalue;

   foreach($json["data"]["hostlist"]as $hostname => $value)
      {
         GLOBAL $hosts,$host_count;

        $hosts[$i]=$hostname;
         
        $i=$i+1;
        $host_count=$i;
        

       //nagios_get_services_status($hostname);
      }

      foreach($json["data"]["hostlist"] as $hostvalue)
       {
           GLOBAL $host_status,$nagios_host_status;
           $host_status[$k]=$nagios_host_status[$hostvalue];


          
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
?>