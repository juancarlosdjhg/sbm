<?php // content="text/plain; charset=utf-8"
session_start();
$arreglo1=$_SESSION['array1'];
$arreglo2=$_SESSION['array2'];
$arreglo3=$_SESSION['array3'];
$arreglo4=$_SESSION['array4'];
$arreglo5=$_SESSION['array5'];
$arreglo6=$_SESSION['array6'];
$arreglo7=$_SESSION['array7'];
$arreglo8=$_SESSION['array8'];
$arreglo9=$_SESSION['array9'];
$arreglo10=$_SESSION['array10'];
$arreglo11=$_SESSION['array11'];
$arreglo12=$_SESSION['array12'];

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

// We need some data
$datay=array($arreglo1,$arreglo2,$arreglo3,$arreglo4,$arreglo5,$arreglo6,$arreglo7,$arreglo8,$arreglo9,$arreglo10,$arreglo11,$arreglo12);
$datax=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$graph = new Graph(800,480);
$graph->img->SetMargin(60,60,55,95);
$graph->SetScale("textlin");
$graph->SetMarginColor("white:1.1");
$graph->SetShadow();

// Set up the title for the graph
$graph->title->Set("Relación Incorporaciones del Inventario");
$graph->title->SetMargin(8);
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetColor("darkred");

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,10);
$graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);

// Show 0 label on Y-axis (default is not to show)
$graph->yscale->ticks->SupressZeroLabel(false);

// Setup X-axis labels
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(90);

// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style
$bplot->SetFillGradient("#2196F3","#2196F3",GRAD_LEFT_REFLECTION);

// Set color for the frame of each bar
$bplot->SetColor("#2196F3");
$graph->Add($bplot);

//blacksend the graph to the browser
$graph->Stroke();
?>
