<?php 
session_start();
ini_set('memory_limit','2048M');
set_time_limit(30);
require_once('fpdf/fpdf.php');

class PDF extends FPDF 
{ 


    function Header() 
    { 

    
        $this->SetFont('Arial','B',12); 
        $this->Image('images/head.jpg',12,0,200,26); 
        $this->Text(21,40,"Listado de Bienes reportados como 'Faltantes por Investigar' Registrados en el Sistema"); 
		$this->SetXY(10, 50);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(150,180,240); 
             $this->Ln();
              $this->Cell(35,7,"   Nombre del Bien",1,0, 'L', true);
              $this->Cell(40,7,utf8_decode("Fecha de Adquisición"),1,0, 'L', true);
              $this->Cell(40,7,utf8_decode(" Serial de Fabricación"),1,0, 'L', true);
              $this->Cell(35,7,utf8_decode("          Sección"),1,0, 'L', true);
               $this->Cell(30,7,utf8_decode(" S.C. Específica"),1,0, 'L', true);
              $this->Cell(25,7,"Valor Unitario",1,1, 'L', true);


    } 

function Reporte(){

$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];


$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." ";
$conx=pg_connect($tiracnx);
 
  $SQL="SELECT * FROM datos_bien as db JOIN bien as b on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT) join bien on db.id_bien=bien.id_bien join concepto_de_movimiento as cdm on bien.id_concepto=cdm.id_concepto join tipo_concepto as tc on cdm.id_tipo_concepto=tc.id_tipo_concepto JOIN bien_activo as ba on b.id_bien=ba.id_bien JOIN seccion as s on ba.id_seccion=s.id_seccion WHERE tc.id_tipo_concepto='15' ORDER BY sg.id_subgrupo,db.nombre_bien";
        $resultados=pg_query($conx ,$SQL); 
        
               $this->SetFont('Arial','',9);


        $this->SetFillColor(230, 230, 245); 
        $this->SetTextColor(3, 3, 3); 
        $color=false;  
         while($row = pg_fetch_array($resultados)) 
        { 

          $nombrebien=$row['nombre_bien'];
          $fecha3=$row['fecha_adquisicion_bien'];
          $fecha2=explode('-', $fecha3, 3);
          $fecha=$fecha2[2]."-".$fecha2[1]."-".$fecha2[0];
          $serial=$row['serial_bien'];
          $seccion=$row['nombre_seccion'];
          $valor=$row['valor_bien'];
          $estado=$row['nombre_sub_categoria_especifica'];

             $this->Cell(35,5,utf8_decode($nombrebien),1,0, 'L', $color);
              $this->Cell(40,5,utf8_decode($fecha),1,0, 'C', $color);
               $this->Cell(40,5,utf8_decode($serial),1,0, 'L', $color);
                $this->Cell(35,5,utf8_decode($seccion),1,0, 'L', $color);
                $this->Cell(30,5,utf8_decode($estado),1,0, 'L', $color);
                 $this->Cell(25,5,utf8_decode($valor)." BsF.  ",1,1, 'R', $color);
          
                $color=!$color;

      } 

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