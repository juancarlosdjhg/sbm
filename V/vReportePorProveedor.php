<?php 
session_start();
ini_set('memory_limit','2048M');
set_time_limit(30);
require_once('fpdf/fpdf.php');

class PDF extends FPDF 
{ 

function abreviar($parametro){
$palabra = $parametro;
$MAX = 14;
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
function abreviar2($parametro){
$palabra = $parametro;
$MAX = 18;
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
$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];

$proveedor=$_SESSION['proveedorid'];

$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." ";
$conx=pg_connect($tiracnx);


if($proveedor=='todos'){
  $nombre_proveedor="Todos";

}
  else{
$sq2="SELECT * FROM proveedor WHERE id_proveedor='".$proveedor."'";   
    $r2=pg_query($sq2);

    while($sec=pg_fetch_array($r2)){
        $nombre_proveedor=$sec['descripcion_proveedor'];}
}
        $this->SetFont('Arial','B',12); 
        $this->Image('images/head.jpg',35,0,200,26); 

        $this->SetXY(25,35); 
        $this->Multicell(220,5,utf8_decode("Reporte de Bienes Muebles por proveedor: ".$nombre_proveedor."."),0,'C');
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(150,180,240); 
             $this->Ln();
              $this->Cell(26,7,utf8_decode("Cod.Proveedor"),1,0, 'C', true);

              $this->Cell(50,7,utf8_decode("Descripción"),1,0, 'C', true);
              $this->Cell(12,7," ID",1,0, 'C', true);
              $this->Cell(38,7,"Nombre Bien",1,0, 'C', true);
              $this->Cell(18,7,utf8_decode("Fecha"),1,0, 'C', true);
                $this->SetFont('Arial','B',9);
              $this->Cell(35,7,utf8_decode("Serial de Fabricación"),1,0, 'C', true);
                $this->SetFont('Arial','B',10);
              $this->Cell(30,7,utf8_decode("S.C.Específica"),1,0, 'C', true);
               $this->Cell(34,7,"Estado del Bien",1,0, 'C', true);
              $this->Cell(25,7,"Valor Unitario",1,1, 'C', true);



    } 

function Reporte(){

$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];

$proveedor=$_SESSION['proveedorid'];
$desde=$_SESSION['proveedordesde'];
$hasta=$_SESSION['proveedorhasta'];

$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." ";
$conx=pg_connect($tiracnx);


if($proveedor=='todos'){

    $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto JOIN proveedor as pro on CAST(db.id_proveedor AS INT)=pro.id_proveedor  join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' ORDER BY db.id_proveedor,db.fecha_adquisicion_bien";               
    
       $resultados=pg_query($SQL); 
     
 
      while($fetch=pg_fetch_array($resultados)){

        $id_bien=$fetch['id_bien'];
        $nombre_bien=$fetch['nombre_bien'];
        $codigo_proveedor=$fetch['codigo_proveedor'];
        $descripcion_proveedor=$fetch['descripcion_proveedor'];

         $fecha3=$fetch['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
        $serial=$fetch['serial_bien'];
        $estado=$fetch['nombre_tipo_concepto'];

          $valor=$fetch['valor_bien'];
          $subgrupo=$fetch['nombre_sub_categoria_especifica'];

          if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }
   
             
       
        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=false;  
      


               $this->SetFont('Arial','',8);

             $this->Cell(26,5,utf8_decode($this->abreviar($codigo_proveedor)),1,0, 'L', $color);
             $this->Cell(50,5,utf8_decode($this->abreviar($descripcion_proveedor)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
             $this->Cell(12,5,utf8_decode($id_bien),1,0, 'L', $color);
             $this->Cell(38,5,utf8_decode($nombre_bien),1,0, 'L', $color);
              $this->Cell(18,5,utf8_decode($fecha),1,0, 'C', $color);
               $this->Cell(35,5,utf8_decode($serial),1,0, 'L', $color);

               $this->SetFont('Arial','',7.5);
                $this->Cell(30,5,utf8_decode($this->abreviar2($subgrupo)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
                $this->Cell(34,5,utf8_decode($estado),1,0, 'L', $color);
                 $this->Cell(25,5,utf8_decode($valor)." BsF.",1,1, 'R', $color);
          
                $color=!$color;
}
      } 


else{


      $SQL="SELECT * FROM datos_bien as db JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto JOIN proveedor as pro on CAST(db.id_proveedor AS INT)=pro.id_proveedor  join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto WHERE db.fecha_adquisicion_bien BETWEEN '".$desde."' and '".$hasta."' AND db.id_proveedor='".$proveedor."'ORDER BY db.id_proveedor,db.fecha_adquisicion_bien";               
    
       $resultados=pg_query($SQL); 
     
 
      while($fetch=pg_fetch_array($resultados)){

        $id_bien=$fetch['id_bien'];
        $nombre_bien=$fetch['nombre_bien'];
        $codigo_proveedor=$fetch['codigo_proveedor'];
        $descripcion_proveedor=$fetch['descripcion_proveedor'];

         $fecha3=$fetch['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
        $serial=$fetch['serial_bien'];
        $estado=$fetch['nombre_tipo_concepto'];

          $valor=$fetch['valor_bien'];
          $subgrupo=$fetch['nombre_sub_categoria_especifica'];

          if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }
    
                
       
        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=false;  
      

               $this->SetFont('Arial','',8);

             $this->Cell(26,5,utf8_decode($this->abreviar($codigo_proveedor)),1,0, 'L', $color);
             $this->Cell(50,5,utf8_decode($this->abreviar($descripcion_proveedor)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
             $this->Cell(12,5,utf8_decode($id_bien),1,0, 'L', $color);
             $this->Cell(38,5,utf8_decode($nombre_bien),1,0, 'L', $color);
              $this->Cell(18,5,utf8_decode($fecha),1,0, 'C', $color);
               $this->Cell(35,5,utf8_decode($serial),1,0, 'L', $color);

               $this->SetFont('Arial','',7.5);
                $this->Cell(30,5,utf8_decode($this->abreviar2($subgrupo)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
                $this->Cell(34,5,utf8_decode($estado),1,0, 'L', $color);
                 $this->Cell(25,5,utf8_decode($valor)." BsF.",1,1, 'R', $color);
          
                $color=!$color;


              }    }   }
 

    //Pie de página 
    function Footer() 
    { 
           
        $this->SetY(-15); 
        $this->SetFont('Arial','I',7); 
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
        $usuario=$_SESSION["nombreUsuario"];
        $this->Line(1,202,278,202); 
        $this->Line(1,209,278,209); 
        $fecha= date("d-m-Y"); 
        $hora=date("h:i:s a"); 
        $this->Text(175,206,"Fecha: ".$fecha); 
        $this->Text(225,206,"Hora: ".$hora); 
        $this->Text(30,206,"Reporte emitido por: ".$usuario); 
        $this->Text(120,214,"Sistema de Bienes Muebles - SBM"); 
         $this->SetY(0); 
    } 

    function __construct() 
    {        
        //Llama al constructor de su clase Padre. 
        //Modificar aka segun la forma del papel del reporte 
        parent::__construct('P','mm','Letter'); 
    } 


} 

    //Creación del objeto de la clase heredada 
    $pdf=new PDF(); 

    $pdf->SetTopMargin(50.4); 
    $pdf->SetLeftMargin(4.5);
    $pdf->AliasNbPages(); 
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetFont('Times','',7); 
    $pdf->AddPage("L");  
    $pdf->Reporte();
    $pdf->Output();     
?>