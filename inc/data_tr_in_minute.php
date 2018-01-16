<?php
require_once 'inc/db.php';

//Подключаемся к БД
$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

$st1 = time() - 60;

$sql1 = "SELECT * FROM transactions WHERE status = 'paid' AND time_add > '$st1'";
$result1 = mysqli_query($db,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)){
    
    $arraypaidtimem[] = $row1['time_add'];
}

$sql1 = "SELECT * FROM transactions WHERE status = 'cancel' AND time_add > '$st1'";
$result1 = mysqli_query($db,$sql1);
while ($row1 = mysqli_fetch_assoc($result1)){
    
    
    $arraycanceltimem[] = $row1['time_add'];
    
}

if (count($arraypaidtimem) < 2){
    $to = "121@aorb.ru";
    $subject = "!!!PaymentGate!!! Внимание, низкая активность!";
    $message = "Внимание! На Платежном Шлюзе зарегистрирована низкая активность! Возможны технические проблемы!";
    $headers = "From: PaymentGate <admininfo@aorb.ru>\r\nContent-type: text/plain; charset=utf-8 \r\n";
    mail ($to, $subject, $message, $headers);
    
    
    
    
    //mail("121@aorb.ru", "!!!PaymentGate!!! Внимание, низкая активность!", "Внимание! На Платежном Шлюзе зарегистрирована низкая активность! Возможны технические проблемы!");
}

//$countgood = mysqli_num_rows($result);
mysqli_close($db);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

