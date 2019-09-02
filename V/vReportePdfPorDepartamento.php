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
$id_entidad=$_SESSION['id_entidad'];
$id_seccion=$_SESSION['id_seccion'];

$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." ";
$conx=pg_connect($tiracnx);

$id_entidad=$_SESSION['id_entidad'];
$id_seccion=$_SESSION['id_seccion'];
$sq="SELECT * FROM entidad_propietaria WHERE id_entidad_propietaria='".$id_entidad."'";   
    $r=pg_query($sq);

    while($dep=pg_fetch_array($r)){
        $nombre_entidad=$dep['nombre_entidad_propietaria'];}

if($id_seccion=='todos'){
  $nombre_seccion="Todos";

}
  else{
$sq2="SELECT * FROM seccion WHERE id_seccion='".$id_seccion."'";   
    $r2=pg_query($sq2);

    while($sec=pg_fetch_array($r2)){
        $nombre_seccion=$sec['nombre_seccion'];}
}
        $this->SetFont('Arial','B',12); 
        $this->Image('images/head.jpg',12,0,200,26); 

        $this->SetXY(25,35); 
        $this->Multicell(170,5,utf8_decode("Listado de Bienes detallado por Departamento: ".$nombre_entidad.", Sección: ".$nombre_seccion."."),0,'C');
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(150,180,240); 
             $this->Ln();
              $this->Cell(20,7,utf8_decode("Sección"),1,0, 'C', true);
              $this->Cell(12,7," ID",1,0, 'C', true);
              $this->Cell(38,7,"Nombre Bien",1,0, 'C', true);
              $this->Cell(18,7,utf8_decode("Fecha"),1,0, 'C', true);
                $this->SetFont('Arial','B',9);
              $this->Cell(35,7,utf8_decode("Serial de Fabricación"),1,0, 'C', true);
                $this->SetFont('Arial','B',10);
              $this->Cell(30,7,utf8_decode("S.C.Específica"),1,0, 'C', true);
               $this->Cell(30,7,"Estado del Bien",1,0, 'C', true);
              $this->Cell(25,7,"Valor Unitario",1,1, 'C', true);



    } 

function Reporte(){

$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];
$id_entidad=$_SESSION['id_entidad'];
$id_seccion=$_SESSION['id_seccion'];

$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." ";
$conx=pg_connect($tiracnx);


if($id_seccion=='todos'){

$sq="SELECT * FROM entidad_propietaria WHERE id_entidad_propietaria='".$id_entidad."'";   
    $r=pg_query($sq);

    while($dep=pg_fetch_array($r)){
        $nombre_entidad=$dep['nombre_entidad_propietaria'];}

  $sqlConsultarSecciones="SELECT * FROM seccion WHERE id_entidad_propietaria='".$id_entidad."'";   
    $resultadosSecciones=pg_query($sqlConsultarSecciones);

    while($secciones=pg_fetch_array($resultadosSecciones)){
        $id_seccion=$secciones['id_seccion'];

          $sql3="SELECT nombre_seccion FROM seccion WHERE id_seccion='".$id_seccion."'";   
           $res3=pg_query($sql3);

              while($sec=pg_fetch_array($res3)){
                $nombre_seccion=$sec['nombre_seccion'];}

          $sql="SELECT * FROM bien_activo WHERE id_seccion='".$id_seccion."'";   
           $res=pg_query($sql);

              while($bienes=pg_fetch_array($res)){
                $id_bien=$bienes['id_bien'];

            $sqlBien="SELECT * FROM datos_bien as db JOIN bien as b on db.id_bien=b.id_bien join sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica WHERE db.id_bien='".$id_bien."' ORDER BY b.id_bien";   
           $DatosBien=pg_query($sqlBien);

            while($bien=pg_fetch_array($DatosBien)){
                $nombrebien=$bien['nombre_bien'];
                 $serial=$bien['serial_bien'];
                  $estatus=$bien['id_concepto'];
          $subgrupo=$bien['nombre_sub_categoria_especifica'];
          $valor=$bien['valor_bien'];
            $fecha3=$bien['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
                  $sqlConcepto="SELECT * FROM concepto_de_movimiento as cm join tipo_concepto as tc on CAST(cm.id_tipo_concepto AS INT)=tc.id_tipo_concepto WHERE cm.id_concepto='".$estatus."'";   
                   $queryConcepto=pg_query($sqlConcepto);
                   while($concepto=pg_fetch_array($queryConcepto)){
                    $estado=$concepto['nombre_tipo_concepto'];}
}                  

       
               $this->SetFont('Arial','',8.5);
        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=false;  
         if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }

               $this->SetFont('Arial','',8);
             $this->Cell(20,5,utf8_decode($this->abreviar($nombre_seccion)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
             $this->Cell(12,5,utf8_decode($id_bien),1,0, 'L', $color);
             $this->Cell(38,5,utf8_decode($nombrebien),1,0, 'L', $color);
              $this->Cell(18,5,utf8_decode($fecha),1,0, 'C', $color);
               $this->Cell(35,5,utf8_decode($serial),1,0, 'L', $color);

               $this->SetFont('Arial','',7.5);
                $this->Cell(30,5,utf8_decode($this->abreviar2($subgrupo)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
                $this->Cell(30,5,utf8_decode($estado),1,0, 'L', $color);
                 $this->Cell(25,5,utf8_decode($valor)." BsF.",1,1, 'R', $color);
          
                $color=!$color;

      } }}


else{

 $sql3="SELECT nombre_seccion FROM seccion WHERE id_seccion='".$id_seccion."'";   
           $res3=pg_query($sql3);

              while($sec=pg_fetch_array($res3)){
                $nombre_seccion=$sec['nombre_seccion'];}

$sq="SELECT * FROM entidad_propietaria WHERE id_entidad_propietaria='".$id_entidad."'";   
    $r=pg_query($sq);

    while($dep=pg_fetch_array($r)){
        $nombre_entidad=$dep['nombre_entidad_propietaria'];}

 
          $sql="SELECT * FROM bien_activo WHERE id_seccion='".$id_seccion."'";   
           $res=pg_query($sql);

              while($bienes=pg_fetch_array($res)){
                $id_bien=$bienes['id_bien'];

            $sqlBien="SELECT * FROM datos_bien as db JOIN bien as b on db.id_bien=b.id_bien join sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica WHERE db.id_bien='".$id_bien."' ";   
           $DatosBien=pg_query($sqlBien);

            while($bien=pg_fetch_array($DatosBien)){
                $nombrebien=$bien['nombre_bien'];
                 $serial=$bien['serial_bien'];
                  $estatus=$bien['id_concepto'];
          $subgrupo=$bien['nombre_sub_categoria_especifica'];
          $valor=$bien['valor_bien'];
            $fecha3=$bien['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
                  $sqlConcepto="SELECT * FROM concepto_de_movimiento as cm join tipo_concepto as tc on CAST(cm.id_tipo_concepto AS INT)=tc.id_tipo_concepto WHERE cm.id_concepto='".$estatus."'";   
                   $queryConcepto=pg_query($sqlConcepto);
                   while($concepto=pg_fetch_array($queryConcepto)){
                    $estado=$concepto['nombre_tipo_concepto'];}
}                  

       
               $this->SetFont('Arial','',9);
        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=false;  
         if($estado=="Incorporación"){
            $estado="Incorporado";
          }
          elseif($estado=="Desincorporación"){
            $estado="Desincorporado";
          }
  $this->SetFont('Arial','',8);
             $this->Cell(20,5,utf8_decode($this->abreviar($nombre_seccion)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
             $this->Cell(12,5,utf8_decode($id_bien),1,0, 'L', $color);
             $this->Cell(38,5,utf8_decode($nombrebien),1,0, 'L', $color);
              $this->Cell(18,5,utf8_decode($fecha),1,0, 'C', $color);
               $this->Cell(35,5,utf8_decode($serial),1,0, 'L', $color);

               $this->SetFont('Arial','',7.5);
                $this->Cell(30,5,utf8_decode($this->abreviar2($subgrupo)),1,0, 'L', $color);

               $this->SetFont('Arial','',8.5);
                $this->Cell(30,5,utf8_decode($estado),1,0, 'L', $color);
                 $this->Cell(25,5,utf8_decode($valor)." BsF.",1,1, 'R', $color);
          
                $color=!$color;

      } }







    }
 

    //Pie de página 
    function Footer() 
    { 
           
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
    $pdf->AddPage();  

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