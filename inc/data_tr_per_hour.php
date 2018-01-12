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

$sql = "SELECT * FROM transactions WHERE status = 'paid' AND time_add > '$st'";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_assoc($result)){
    
    $arraypaidtime[] = $row['time_add'];
}

$sql = "SELECT * FROM transactions WHERE status = 'cansel' AND time_add > '$st'";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_assoc($result)){
    
    if (!$row['time_add']){
        $arraycanceltime[] = 0;
    } else {
        $arraycanceltime[] = $row['time_add'];
    }
}

for ($i=0; $i<count($arraypaidtime); $i++){
    $temp = (int)(($arraypaidtime[$i]-$arraypaidtime[0])/60);   
    $massivpaid[$temp]++;   
    //echo $arraypaidtime[$i]."\n\r";
}
// echo "----------------------------------------------";

for ($i=0; $i<count($arraycanceltime); $i++){
    $temp = (int)(($arraycanceltime[$i]-$arraycanceltime[0])/60);   
    $massivcancel[$temp]++;   
    //echo $arraycanceltime[$i]."\n\r";
}

//$countgood = mysqli_num_rows($result);
mysqli_close($db);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

