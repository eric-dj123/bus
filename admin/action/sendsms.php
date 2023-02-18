<?php

include('../include/connect.php');
   $user_id  = $_POST['user_id'];
   $bus_id  = $_POST['bus_id'];
   $platenumber  = $_POST['platenumber'];
   $phonenumber = $_POST['phonenumber'];
   $date_notified = $_POST['date_notified'];
   $destination = $_POST['destination'];
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $dipaturetime = $_POST['dipaturetime'];
   $comment = $_POST['comment'];
   $insert=mysqli_query($con,"INSERT INTO `notify_tbl`(`user_id`, `bus_id`,`destination`,`dipaturetime`,`comment`,`date_notified`) VALUES
   ('$user_id','$bus_id','$destination','$dipaturetime','$comment'.'$date_notified')");

         if($insert)
         {
              // Send sms
              $message ="";
              $message .= 'Dear' .' '.$firstname.' '.$lastname.' Turakumenyeshako'.' ';
              $message .= 'Imodokoka Utwara Ifite :'.$platenumber.' :  ko izahaguruka: '.$date_notified.' :'.$dipaturetime.' ';
              $message .= ''.$destination.'';


              $data = array(

                 "sender"=>'REMS',

                 "recipients"=>"$phonenumber",
                  "message"=>"$message",
                  );
                  $url="https://www.intouchsms.co.rw/api/sendsms/.json";
                  $data = http_build_query($data);
                  $username="djeric";
                  $password="Eric@12345";
                  $ch = curl_init();
                  curl_setopt($ch,CURLOPT_URL,$url);
                  curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
                  curl_setopt($ch,CURLOPT_POST,true);
                  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
                  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
                  $result=curl_exec($ch);
                  $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
                  curl_close($ch);

              // end of sms



    echo '<script>alert("Sending Success");window.location.assign("../notifydriver.php");</script>';
         }



