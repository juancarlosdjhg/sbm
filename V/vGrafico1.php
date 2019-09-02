<?php 
session_start();

include ("jpgraph/jpgraph.php"); 
include ("jpgraph/jpgraph_pie.php"); 
include ("jpgraph/jpgraph_pie3d.php");
$num=$_SESSION['num'];
$num2=$_SESSION['num2'];

$data = array($num,$num2); 

$graph = new PieGraph(440,305,"auto"); 
$graph->img->SetAntiAliasing(); 
$graph->SetMarginColor('#FEFFF8'); 
$graph->title->Set(utf8_decode("Relación Incorporaciones / Desincorporaciones")); 

$p1 = new PiePlot3D($data); 
$p1->SetSize(0.35); 
$p1->SetCenter(0.5); 
$p1->SetSliceColors(array('#09A7F0','#00F3FF')); 
$p1->value->SetFont(FF_FONT1,FS_BOLD); 
$p1->value->SetColor("black"); 
$p1->SetLabelPos(0.2); 
$p1->SetSize(135); 

$nombres=array("Bienes Incorporados: ".$num ,"Bienes Desincorporados:: ".$num2); 
$p1->SetLegends($nombres); 

$p1->ExplodeAll(); 

$graph->Add($p1); 
$graph->Stroke();

?>