<?php

$a = array(1,2,4,7,1,6,2,8); //duomenys
$ats=array();
$kiek=0;
$sum=0;
$minval=10; //parinktas pagal tai, kad skaiciai visi yra iki 10 - mties
//$ii=count($a);
$b=$a; 

// function remove_used_elements($mass) {
//   echo 'removed';  
// }
for ($i=0; $i<count($a); $i++) {
   $sum = $sum + $a[$i]; echo ' ';
   
   for ($ii=count($b); $ii>0; $ii--) { 
    if (isset($b[$ii])) {
       $sum1 = $sum + $b[$ii];
       echo $sum1.' ';
       if ($sum1 == $minval) {
         echo 'tinka'; break;
       } else {
          $sum1=$sum;
       }
      $sum=0; $sum1=0; 
    }
   // echo $sum;

   //    if ($sum == $minval) {
   //       echo 'tinka';
   //       $sum=0;
   //       break;
   //    }
   }
   
}
