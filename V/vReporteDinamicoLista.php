<?php 
session_start();
ini_set('memory_limit','2048M');
set_time_limit(30);
require_once('fpdf/fpdf.php');

class PDF extends FPDF 
{ 
  public $sucursal; 
  public $f_ini; 
  public $f_fin; 

function abreviar($parametro){
$palabra = $parametro;
$MAX = 20;
if(strlen($palabra)>$MAX){
    
  $titulo="";
  $array=array();
  $array=explode(" ", $palabra);
  $lenght=count($array);

  for($i=0;$i<$lenght;$i++){
    $lenght2=strlen($array[$i]);
    if($lenght2<2){
      $titulo.=strtoupper($array[$i][0]); 
      $titulo.=" "; 
      }elseif($lenght2<3){
      $titulo.=strtoupper($array[$i][0]); 
        $titulo.=$array[$i][1]; 
          $titulo.=" "; 
        }elseif($lenght2==3){
      $titulo.=strtoupper($array[$i][0]); 
          $titulo.=$array[$i][1];
          $titulo.=$array[$i][2];
          $titulo.=" "; 
          }elseif($lenght2>3){
      $titulo.=strtoupper($array[$i][0]); 
            $titulo.=$array[$i][1];
            $titulo.=$array[$i][2];
            $titulo.=". ";  
      }

  }

  if(strlen($titulo)>$MAX){

  }

  return $titulo;

  }else
  
  return $palabra;

}

    function Header() 
    { 

$estatus1=0;$valor1=0;$serial1=0;$marca1=0;$modelo1=0;$color1=0;$categoria1=0;$subcategoria1=0;$especifica1=0;
$check=$_SESSION['check'];
 
$cantidadTablas=count($check);
$cantidadTablas2=$cantidadTablas+2;

 if($cantidadTablas>2){
  $this->SetFont('Arial','B',12); 
    $width=252/$cantidadTablas2;
     $this->Image('images/head.jpg',46,0,200,26); 
      $this->Text(94,36,"Reporte de Bienes Registrados en el Sistema"); 
      }


    else{
      $this->SetFont('Arial','B',12); 
    $width=186/$cantidadTablas2; 
     $this->Image('images/head.jpg',12,0,200,26);
      $this->Text(60,36,"Reporte de Bienes Registrados en el Sistema"); 
    }  

for($i=0;$i<$cantidadTablas;$i++){

if ($check[$i]=='estatus'){
  $estatus1=1;
}

if($check[$i]=='valor'){
  $valor1=1;
}

if($check[$i]=='serial'){
  $serial1=1;
}

if($check[$i]=='marca'){
  $marca1=1;
}

if($check[$i]=='modelo'){
  $modelo1=1;
}

if($check[$i]=='color'){
  $color1=1;
}

if($check[$i]=='categoria'){
  $categoria1=1;
}

if($check[$i]=='subcategoria'){
  $subcategoria1=1;
}

if($check[$i]=='especifica'){
  $especifica1=1;
}
}
 $this->SetFont('Arial','B',12); 
        $this->SetXY(10, 50);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(150,180,240); 
             $this->Ln();
              $this->Cell(18,7,"Nro ID",1,0, 'C', true);
              $this->Cell($width,7,"Nombre Bien",1,0, 'C', true);
              $this->Cell($width,7,utf8_decode("Fecha"),1,0, 'C', true);
              if($serial1==1){
              $this->Cell($width,7,utf8_decode("Serial"),1,0, 'C', true);
              }

              if($estatus1==1){
              $this->Cell($width,7,"  Estatus ",1,0, 'C', true);}

              if($marca1==1){
              $this->Cell($width,7,"Marca",1,0, 'C', true);}

              if($modelo1==1){
              $this->Cell($width,7,"Modelo",1,0, 'C', true);}

              if($color1==1){
              $this->Cell($width,7,"Color",1,0, 'C', true);}

              if($categoria1==1){
              $this->Cell($width,7,utf8_decode("Categoría"),1,0, 'C', true);}

              if($subcategoria1==1){
              $this->Cell($width,7,utf8_decode(" Subcategoría"),1,0, 'C', true);}

              if($especifica1==1){
              $this->Cell($width,7,utf8_decode(" Específica"),1,0, 'C', true);}

              if($valor1==1){
              $this->Cell($width,7,"Valor (BsF.)",1,0, 'C', true);}


              $this->Cell($width,7,"",0,1, 'C', false);


    } 

function Reporte(){

$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];
$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password."";
$conx=pg_connect($tiracnx);

$estatus1=0;$valor1=0;$serial1=0;$marca1=0;$modelo1=0;$color1=0;$categoria1=0;$subcategoria1=0;$especifica1=0;
$check=$_SESSION['check'];
 
$cantidadTablas=count($check);
$cantidadTablas2=$cantidadTablas+2;

 if($cantidadTablas>2){
    $width=252/$cantidadTablas2;
      }


    else{
    $width=186/$cantidadTablas2; 
    }  
 
for($i=0;$i<$cantidadTablas;$i++){

if ($check[$i]=='estatus'){
  $estatus1=1;
}

if($check[$i]=='valor'){
  $valor1=1;
}

if($check[$i]=='serial'){
  $serial1=1;
}

if($check[$i]=='marca'){
  $marca1=1;
}

if($check[$i]=='modelo'){
  $modelo1=1;
}

if($check[$i]=='color'){
  $color1=1;
}

if($check[$i]=='categoria'){
  $categoria1=1;
}

if($check[$i]=='subcategoria'){
  $subcategoria1=1;
}

if($check[$i]=='especifica'){
  $especifica1=1;
}
}

      

        $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto join grupo on grupo.id_grupo=CAST(sg.id_grupo AS INT) ORDER BY sg.id_subgrupo,db.id_bien";
        $resultados=pg_query($conx ,$SQL); 

       


               $this->SetFont('Arial','',9);


        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=TRUE;  
         while($row = pg_fetch_array($resultados)) 
        { 
          $color=!$color;
             

          $id_bien=$row['id_bien'];
          $nombrebien=$row['nombre_bien'];
           $fecha3=$row['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
          $serial=$row['serial_bien'];
          $subgrupo=$row['nombre_subgrupo'];
          $valor=$row['valor_bien'];
          $estado2=$row['nombre_tipo_concepto']; 
          $estado=$this->abreviar($estado2);
          $marca=$row['marca_bien']; 
          $modelo=$row['modelo_bien']; 
          $colorbien=$row['color_bien'];
          $categoria=$row['nombre_grupo'];
          $scespecifica=$row['nombre_sub_categoria_especifica'];


          if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }
          elseif($estado=="Flotante sin Incorporar"){
            $estado="Flotante";
          }
             $this->Cell(18,5,$id_bien,1,0, 'C', $color);
             $this->Cell($width,5,$nombrebien,1,0, 'L', $color);
              $this->Cell($width,5,$fecha,1,0, 'C', $color);

               if($serial1==1){
               $this->Cell($width,5,$serial,1,0, 'L', $color); }

               if($estatus1==1){
                $this->Cell($width,5,$estado,1,0, 'L', $color);}

               if($marca1==1){
                 $this->Cell($width,5,$marca,1,0, 'L', $color);}

                  if($modelo1==1){
                 $this->Cell($width,5,$modelo,1,0, 'L', $color);}

                  if($color1==1){
                 $this->Cell($width,5,$colorbien,1,0, 'L', $color);}

                 if($categoria1==1){
                 $this->Cell($width,5,$categoria,1,0, 'L', $color); }

                  if($subcategoria1==1){
                $this->Cell($width,5,$subgrupo,1,0, 'L', $color);}

                 if($especifica1==1){
                   $this->Cell($width,5,$scespecifica,1,0, 'L', $color); }

                 if($valor1==1){
                 $this->Cell($width,5,$valor.' Bs',1,0, 'R', $color);}

                   $this->Cell(40,5,'',0,1, 'L', false);

                 

                  
            

      } 


}
    //Pie de página 
    function Footer() 
    { 
          

$cantidadTablas=count($_SESSION['check']);
    if($cantidadTablas>2){
        $this->SetY(-10); 
        $this->SetFont('Arial','I',7); 
        $this->Cell(0,2,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
        $usuario=$_SESSION["nombreUsuario"];
        $this->Line(1,204,276,204); 
        $this->Line(1,210,276,210); 
        $fecha= date("d-m-Y"); 
        $hora=date("h:i:s a"); 
        $this->Text(185,208,$fecha); 
        $this->Text(225,208,$hora); 
        $this->Text(18,208,"Reporte emitido por: ".$usuario); 
        $this->Text(120,214,"Sistema de Bienes Muebles - SBM"); 
         $this->SetY(0); 
    } 

    else{

        $this->SetY(-15); 
        $this->SetFont('Arial','I',7); 
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
        $usuario=$_SESSION["nombreUsuario"];
        $this->Line(1,266,214,266); 
        $this->Line(1,273,214,273); 
        $fecha= date("d-m-Y"); 
        $hora=date("h:i:s a"); 
        $this->Text(145,270.5,$fecha); 
        $this->Text(175,270.5,$hora); 
        $this->Text(30,270.5,"Reporte emitido por: ".$usuario); 
        $this->Text(87,276.5,"Sistema de Bienes Muebles - SBM"); 
         $this->SetY(0); 



    }
  }

    function __construct() 
    {        
        //Llama al constructor de su clase Padre. 
        //Modificar aka segun la forma del papel del reporte 
        parent::__construct('P','mm','Letter'); 
    } 


} 

$cantidadTablas=count($_SESSION['check']);
    //Creación del objeto de la clase heredada 
    $pdf=new PDF(); 
    $pdf->SetTopMargin(50.4); 
    $pdf->SetLeftMargin(4.5);     
    $pdf->AliasNbPages(); 
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetFont('Times','',7); 
    if($cantidadTablas>2){
    $pdf->AddPage('L');   }
    else{
      $pdf->AddPage();
    }  
      /*  
        $SQL="SELECT * FROM datos_bien as db JOIN subgrupo as sg  on db.id_subgrupo=sg.id_subgrupo";
        $resultados=pg_query($conx ,$SQL); 

         while($row = pg_fetch_array($resultados)) 
        { 
          
        } 
           $pdf->cell(10,80,'',0,1); 
           $pdf->Text(30,$pdf->GetY(),'Nombre'); 
           $pdf->Text(115,$pdf->GetY(),'Fecha'); 
           $pdf->Text(160,$pdf->GetY(),'Firma'); 
           $pdf->cell(0,5,'',0,1); 
           $pdf->Text(15,$pdf->GetY(),'_________________________________________'); 
           $pdf->Text(100,$pdf->GetY(),'________________________'); 
           $pdf->Text(145,$pdf->GetY(),'________________________'); 

*/  

$pdf->Reporte();
    $pdf->Output();     
?>