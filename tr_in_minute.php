<?php
// Standard inclusions     
//include("Pchart/class/pData.class.php");
//include("Pchart/class/pDraw.class.php");
//include("Pchart/class/pPie.class.php");
//include("Pchart/class/pImage.class.php");


include ('inc/data_tr_in_minute.php');
  
/* Create and populate the pData object */
 $MyData = new pData();   
 $MyData->addPoints(array(count($arraypaidtimem), count($arraycanceltimem)),"ScoreA");  
 $MyData->setSerieDescription("ScoreA","Application A");
 

 /* Define the absissa serie */
 $MyData->addPoints(array("Успешные","Отказ"),"Labels");
 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(900,430,$MyData);

 /* Draw a solid background */
 //$Settings = array("R"=>173, "G"=>152, "B"=>217, "Dash"=>1, "DashR"=>193, "DashG"=>172, "DashB"=>237);
 //$myPicture->drawFilledRectangle(0,0,900,430,$Settings);

 /* Draw a gradient overlay */
 //$Settings = array("StartR"=>209, "StartG"=>150, "StartB"=>231, "EndR"=>111, "EndG"=>3, "EndB"=>138, "Alpha"=>50);
 //$myPicture->drawGradientArea(0,0,900,430,DIRECTION_VERTICAL,$Settings);
 //$myPicture->drawGradientArea(0,0,900,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,899,429,array("R"=>0,"G"=>0,"B"=>0));

 /* Write the picture title */ 
 $myPicture->setFontProperties(array("FontName"=>"PChart/fonts/verdana.ttf","FontSize"=>16));
 $myPicture->drawText(10,28,"Транзакции за минуту",array("R"=>0,"G"=>0,"B"=>0));

 /* Set the default font properties */ 
 $myPicture->setFontProperties(array("FontName"=>"PChart/fonts/verdana.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));

 /* Enable shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>50));

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Draw a simple pie chart */ 
 //$PieChart->draw2DPie(185,205,array("WriteValues"=>PIE_VALUE_NATURAL, "SecondPass"=>FALSE, "Radius"=>170));
 $PieChart->draw2DPie(185,205,array("WriteValues"=>PIE_VALUE_NATURAL,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE,"BorderR"=>255,"BorderG"=>255,"BorderB"=>255, "Radius"=>170, "LabelColor"=>PIE_LABEL_COLOR_MANUAL, "ValueR"=>0, "ValueG"=>0, "ValueB"=>0));
 /* Draw an AA pie chart */ 
 //$PieChart->draw2DPie(340,125,array("DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));

 /* Draw a splitted pie chart */ 
 $PieChart->draw2DPie(625,205,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DataGapAngle"=>10,"DataGapRadius"=>2,"Border"=>TRUE,"BorderR"=>255,"BorderG"=>255,"BorderB"=>255, "Radius"=>170, "LabelColor"=>PIE_LABEL_COLOR_MANUAL, "ValueR"=>0, "ValueG"=>0, "ValueB"=>0));

 /* Write the legend */
 $myPicture->setFontProperties(array("FontName"=>"PChart/fonts/verdana.ttf","FontSize"=>10));
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
 $myPicture->drawText(185,405,"Количество транзакций",array("DrawBox"=>TRUE,"BoxRounded"=>TRUE,"R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
 $myPicture->drawText(625,405,"Количество транзакций в процентах",array("DrawBox"=>TRUE,"BoxRounded"=>TRUE,"R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));

 /* Write the legend box */ 
 $myPicture->setFontProperties(array("FontName"=>"PChart/fonts/verdana.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
 $PieChart->drawPieLegend(740,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
  
 $myPicture->Render("pic/tr_in_minute.png");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

