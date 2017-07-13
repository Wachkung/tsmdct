<?php
       date_default_timezone_set('Asia/Bangkok');
 
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if ($_GET['rev'] == 1) {

    $day = date("d");

    $month = date("m");

   $time = date("H:i:s");
  //  $time=date_format(now(),"%H:i:s");
   // $yearthai = date("Y") + 543;

    switch ($month) {
        case 1:
            echo "วันที่ : $day มกราคม $yearthai เวลา: $time";
            break;
        case 2:
            echo "วันที่ : $day กุมภาพันธ์ $yearthai เวลา:  $time";
            break;
        case 3:
            echo "วันที่ : $day มีนาคม $yearthai เวลา:  $time";
            break;
        case 4:
            echo "วันที่ : $day เมษายน $yearthai เวลา:  $time";
            break;
        case 5:
            echo "วันที่ : $day พฤษภาคม $yearthai เวลา:  $time";
            break;
        case 6:
            echo "วันที่ : $day มิถุนายน $yearthai เวลา:  $time";
            break;
        case 7:
            echo "วันที่ : $day กรกฏาคม $yearthai เวลา:  $time";
            break;
        case 8:
            echo "วันที่ : $day สิงหาคม $yearthai เวลา:  $time";
            break;
        case 9:
            echo "วันที่ : $day กันยายน $yearthai เวลา:  $time";
            break;
        case 10:
            echo "วันที่ : $day ตุลาคม $yearthai เวลา:  $time";
            break;
        case 11:
            echo "วันที่ : $day พฤษจิกายน $yearthai เวลา:  $time";
            break;
        case 12:
            echo "วันที่ : $day ธันวาคม $yearthai เวลา:  $time";
            break;
    }

        
        


    $thisnewdate = $time;
   


//echo"newdate: $thisnewdate";
    // $dateyear = date("Y");
    //$datemonth = date("m") ;
    //$dated = date("d") ;
    // $olderdate = date('Y-m-d H:i');  
    //$dateh =date('H');
    //$datei =date('i')+10;
    //echo 'hkhjkhkhk'. $date ;
    //  setdate  insert  moning
    $insertpointdate = '08:20:00';
    //   update     evening
    $updatepoint1515 = '15:45:00';

    //   update    night  
    $updatepoint2315 = '23:45:00';




   //  if (isset($thisnewdate) and $thisnewdate == $insertpointdate) {
  //  echo "<meta http-equiv='refresh' content='0; url=/webhi/moniter/opd/job_insert_jobnurse.php'><hr>";

 //  exit();
 //  } else {
                                   //  echo "PLEASE  wait.....  DON'T CLOSED  ";
                                  // '<br>';
 // echo " <br><br> PLEASE WAIT DON'T SHUTDOWN  <br><br>  INSERT  DATA TO JOB_NURSE  AT 07.15  AM";
  // }
    if (isset($thisnewdate) and $thisnewdate == $updatepoint1515) {

  echo "<meta http-equiv='refresh' content='0; url=/webhi/moniter/opd/job_update1_jobnurse.php'><hr>";

        exit();
    } else {
      //  echo "PLEASE  wait.....  DON'T CLOSED  ";
       // '<br>';
        echo "<br> UPDATE  DATA TO JOB_NURSE   AT 15.25  PM";
    }
                            if (isset($thisnewdate) and $thisnewdate == $updatepoint2315) {

                          echo "<meta http-equiv='refresh' content='0; url=/webhi/moniter/opd/job_update2_jobnurse.php'><hr>";

                           exit();
                             } else {



     //   echo "PLEASE  wait.....  DON'T CLOSED  ";
     //   '<br>';

                            echo "<br>  UPDATE  DATA TO JOB_NURSE   AT 23.55  PM";
                    }
        
   /// ------>   rev     




   if (isset($thisnewdate) and $thisnewdate == $insertpointdate) {

        echo "<meta http-equiv='refresh' content='0; url=/webhi/moniter/opd/job_update3_jobnurse.php'><hr>";

            exit();
   } else {



                                        echo "PLEASE  wait.....  DON'T CLOSED  ";
                                '<br>';

 echo "<br>  UPDATE  DATA TO JOB_NURSE   AT 07.25  PM";
  }
        
   /// ------>   rev     














}
?>










