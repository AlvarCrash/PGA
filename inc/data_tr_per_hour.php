<?php
require_once 'inc/db.php';

//Подключаемся к БД
$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

$et = time();
$st = time() - 3600;

$sql = "SELECT * FROM transactions WHERE time_add > '$st'";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_assoc($result)){
    $arraystatus[] = $row['status'];
    $arraypaidtime[] = $row['time_add'];
}

/*$sql = "SELECT * FROM transactions WHERE status = 'cancel' AND time_add > '$st'";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_assoc($result)){
    
    $arraycanceltime[] = $row['time_add'];
    
}*/
for ($x=0; $x<59; $x++){
$massivcancel[$x] = 0;
}

for ($i=0; $i<count($arraypaidtime); $i++){
    $temp = (int)(($arraypaidtime[$i]-$arraypaidtime[0])/60);
    if (($arraystatus[$i] == 'paid') or ($arraystatus[$i] == 'new')){
        $massivpaid[$temp]++;
    } else {
        $massivcancel[$temp]++;
    }
}

/*for ($i=0; $i<count($arraypaidtime); $i++){
    $temp = (int)(($arraypaidtime[$i]-$arraypaidtime[0])/60);   
    $massivpaid[$temp]++;   
    //echo $arraypaidtime[$i]."\n\r";
    if ($araaycanceltime[$i] == 0){
        $massivcancel[$temp] = 0;
    } else {
        $massivecancel[$temp]++;
    }
}*/
// echo "----------------------------------------------";

//if (count($arraycanceltime) == 0){
  //  for ($i=0; $i<59; $i++){
//        $massivcancel[$i] = 0;
 //   }
//}
//for ($i=0; $i<count($arraycanceltime); $i++){
    
    
  //  $tempb = (int)(($arraycanceltime[$i]-$arraycanceltime[0])/60);   
 //   if ($arraycanceltime[$i]){
 //       $massivcancel[$tempb] = 0 ;
 //  } else {
 //       $massivcancel[$tempb]++;
  //  }   
    //echo $arraycanceltime[$i]."\n\r";
//}

//$countgood = mysqli_num_rows($result);
mysqli_close($db);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

