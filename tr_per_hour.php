<?php
//Подключаем библиотеку PChart для диаграмм
include("Pchart/class/pData.class.php");
include("Pchart/class/pDraw.class.php");
include("Pchart/class/pPie.class.php");
include("Pchart/class/pImage.class.php");
include 'inc/data_tr_per_hour.php';
//echo $count;
for ($iii=1; $iii<=60; $iii++){
    $minut[$iii] = $iii;
}

//Рисуем диаграмму
 /* Create and populate the pData object */
 $MyData = new pData();  
 $MyData->addPoints($massivpaid,"Успешные");
 $MyData->addPoints($massivcancel,"Отказ");
 //$MyData->addPoints(array(2,7,5,18,19,22),"Probe 3");
 //$MyData->setSerieTicks("Успешные",8);
 $MyData->setSerieWeight("Успешные",1);
 $MyData->setAxisName(0,"Транзакции");
 $MyData->addPoints($minut,"Labels");
 $MyData->setSerieDescription("Labels","Months");
 $MyData->setAbscissa("Labels");


 /* Create the pChart object */
 $myPicture = new pImage(900,430,$MyData);

 /* Turn of Antialiasing */
 $myPicture->Antialias = TRUE;

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,899,429,array("R"=>0,"G"=>0,"B"=>0));
 
 /* Write the chart title */ 
 $myPicture->setFontProperties(array("FontName"=>"Pchart/fonts/verdana.ttf","FontSize"=>11));
 $myPicture->drawText(250,35,"Мониторинг транзакций за последний час",array("FontSize"=>16,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>"Pchart/fonts/verdana.ttf","FontSize"=>6));

 /* Define the chart area */
 $myPicture->setGraphArea(60,40,850,400);

 /* Draw the scale */
 $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myPicture->drawScale($scaleSettings);

 /* Turn on Antialiasing */
 $myPicture->Antialias = TRUE;

 /* Draw the line chart */
 $myPicture->drawLineChart();

 /* Write the chart legend */
 $myPicture->drawLegend(740,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

 /* Render the picture (choose the best way) */
 $myPicture->render("pic/tr_per_hour.png");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

