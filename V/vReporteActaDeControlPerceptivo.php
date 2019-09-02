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


    function Header() 
    { 

$id_responsable_revision=$_SESSION['i'];
$descripcion_bien_revisado=$_SESSION['d'];
$conclusion_bien_revisado=$_SESSION['c'];

$host=$_SESSION['host'];
$port=$_SESSION['port'];
$dbname=$_SESSION['dbname'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];
$tiracnx="host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password."";
$conx=pg_connect($tiracnx);

$id_bien=$_SESSION['idBien'];        

      
        $this->SetFont('Arial','B',12); 
        $this->Image('images/head.jpg',6,0,200,26); 
        $this->Text(70,35,"Acta de Control Perceptivo"); 

        $sqlConsultar="SELECT * FROM bien as b JOIN datos_bien as db on b.id_bien=db.id_bien JOIN sub_categoria_especifica as sce on CAST(db.id_sub_categoria_especifica AS INT)=sce.id_sub_categoria_especifica JOIN subgrupo as sg  on sg.id_subgrupo=CAST(sce.id_subgrupo AS INT)  JOIN proveedor as p on p.id_proveedor=CAST(db.id_proveedor as INT) JOIN datos_factura as df on db.id_bien=CAST(df.id_bien AS INT) WHERE b.id_bien='".$id_bien."'";		
		$resultados=pg_query($conx ,$sqlConsultar);

    

     

  	while($row=pg_fetch_array($resultados)){

							$nombre_bien=$row["nombre_bien"];
							$valor_bien=$row["valor_bien"];
							$marca_bien=$row["marca_bien"];
							$modelo_bien=$row["modelo_bien"];
							$color_bien=$row["color_bien"];
							$ruta_imagen=$row["ruta_imagen"];
							$id_subgrupo=$row["id_subgrupo"];
							$id_grupo=$row["id_grupo"];
							$fecha_adquisicion_bien=$row["fecha_adquisicion_bien"];
							$descripcion_bien=$row["descripcion_bien"];
							$serial_bien=$row["serial_bien"];
							$rif_proveedor=$row['rif'];
              $nombre_proveedor=$row['descripcion_proveedor'];
              $tipo_proveedor=$row['tipo_proveedor'];
             

              $orden_compra=$row["orden_de_compra"];
              $orden_servicio=$row["orden_de_servicio"];
              $fecha3=$row['fecha_orden_de_compra'];
               $fecha2=explode('-', $fecha3, 3);
               $dia=$fecha2[2];
               $mes=$fecha2[1];
               $anio=$fecha2[0];
              $nota_entrega=$row["nota_de_entrega"];
              $factura_nro=$row["numero_factura"];
              
              $fechaa=$row["fecha_factura"];
               $fechaa2=explode('-', $fechaa, 3);
               $dia2=$fechaa2[2];
               $mes2=$fechaa2[1];
               $anio2=$fechaa2[0];
              $total_orden=$row["total_orden_de_compra"];
              $total_factura=$row["total_factura"];



							$sqlConsultarGrupo="select nombre_grupo from grupo where id_grupo='$id_grupo'";
							$resultados2=pg_query($conx ,$sqlConsultarGrupo);

							while($row2=pg_fetch_array($resultados2)){
								$grupo=$row2["nombre_grupo"];
							}





}


        $this->SetFont('Arial','',9);
        $this->SetFillColor(180,210,280); 
             $this->Ln();
              
            	$this->SetXY(116, 37);
				$this->Cell(55,6,"Fecha:",1,0, 'L', true);
               
            	$this->Cell(26,6,"",1,1, 'L', false);
                
            	$this->SetXY(116, 43);$this->Cell(55,6,"Nro de Control Perceptivo:",1,0, 'L', true); 
            	while(strlen($id_bien)<9){
            		$id_bien="0".$id_bien;
            	}
			    $this->Text(178,47,$id_bien);
            	$this->Cell(26,6,"",1,1, 'L', false);
                $this->SetXY(116, 49); $this->Cell(55,6,utf8_decode("Número de Paginas"),1,0, 'L', true);
                $this->Text(178,41,date("d/m/Y"));
            	$this->Cell(26,6,"",1,1, 'L', false);
            	 $this->Text(189,53,"1/1");
   				 $this->Ln();

            	 $this->SetXY(12, 60); $this->Cell(55,6,"           ORDEN DE COMPRA:",1,0, 'L', true);
            	$this->Cell(55,6,"           ORDEN DE SERVICIO:",1,0, 'L', true);
            	$this->Cell(10,6," DIA:",1,0, 'L', true);
				$this->Cell(10,6,"MES:",1,0, 'L', true);
				$this->Cell(10,6,utf8_decode("AÑO:"),1,0, 'L', true);
				$this->Cell(45,6,"              TOTAL BSF.:",1,0, 'L', true);

			   $this->SetXY(12, 66); $this->Cell(55,6,utf8_decode($orden_compra),1,0, 'C', false);
            	$this->Cell(55,6,utf8_decode($orden_servicio),1,0, 'C', false);
            	$this->Cell(10,6,$dia,1,0, 'C', false);
				$this->Cell(10,6,$mes,1,0, 'C', false);
				$this->Cell(10,6,utf8_decode($anio),1,0, 'C', false);
				$this->Cell(45,6,utf8_decode($total_orden." Bs"),1,0, 'C', false);

				$this->SetXY(12, 72); $this->Cell(185,14,"  ",1,0, 'L', false);

				$this->Text(60,76," DETALLES DEL PROVEEDOR O PRESTADOR DEL SERVICIO: ");
          $this->SetXY(12, 72); $this->Cell(185,14,"RIF: J-".$rif_proveedor.".  Nombre del Proveedor: ".strtoupper($nombre_proveedor),0,0, 'C', false);
          $this->SetXY(12, 76); $this->Cell(185,14,"Proveedor de tipo: ".strtoupper($tipo_proveedor),0,0, 'C', false);
            	 $this->SetXY(12, 86); $this->Cell(55,6,"            NOTA DE ENTREGA:",1,0, 'L', true);
            	$this->Cell(55,6,"                 FACTURA NRO",1,0, 'L', true);
            	$this->Cell(10,6," DIA:",1,0, 'L', true);
				$this->Cell(10,6,"MES:",1,0, 'L', true);
				$this->Cell(10,6,utf8_decode("AÑO:"),1,0, 'L', true);
				$this->Cell(45,6,"              TOTAL BSF.:",1,0, 'L', true); 

			   $this->SetXY(12, 92); $this->Cell(55,6,utf8_decode($nota_entrega),1,0, 'C', false);
            	$this->Cell(55,6,utf8_decode($factura_nro),1,0, 'C', false);
            	$this->Cell(10,6,$dia2,1,0, 'C', false);
				$this->Cell(10,6,$mes2,1,0, 'C', false);
				$this->Cell(10,6,utf8_decode($anio2),1,0, 'C', false);
				$this->Cell(45,6,utf8_decode($total_factura." Bs"),1,0, 'C', false);

				$this->SetXY(12, 98); $this->Cell(185,14,utf8_decode(strtoupper($descripcion_bien)),1,0, 'C', false);

				$this->Text(50,102,utf8_decode(" CONCEPTO GENERAL DE LA ADQUISICIÓN O PRESTACIÓN DEL SERVICIO: "));

				$this->SetXY(12, 112); $this->Cell(185,6,utf8_decode("                                                          DESCRIPCIÓN DEL BIEN O PRESTACIÓN DEL SERVICIO "),1,0, 'L', true);

				$this->SetXY(12, 118); $this->Cell(185,22,"  ",1,0, 'L', false);

				$this->Text(12,122,utf8_decode(" CANTIDAD:  "));
				$this->Text(58,122,utf8_decode("01"));
				$this->Text(12,126,utf8_decode(" TIPO DE BIEN:  "));
				$this->Text(58,126,utf8_decode(strtoupper($grupo)));
				$this->Text(102,122,utf8_decode(" MARCA:  "));
				$this->Text(128,122,utf8_decode(strtoupper($marca_bien)));
				$this->Text(102,126,utf8_decode(" MODELO:  "));
				$this->Text(128,126,utf8_decode(strtoupper($modelo_bien)));
				$this->Text(12,130,utf8_decode(" SERIAL:  "));
				$this->Text(58,130,utf8_decode(strtoupper($serial_bien)));
				$this->Text(102, 130,utf8_decode(" COLOR:  "));
				$this->Text(128,130,utf8_decode(strtoupper($color_bien)));
				$this->Text(12,134,utf8_decode(" NRO DE IDENTIFICACIÓN:  "));
				$this->Text(58,134,utf8_decode(strtoupper($id_bien)));
				$this->Text(12,138,utf8_decode(" OTROS:  "));
				$this->Text(30,138,utf8_decode(strtoupper($descripcion_bien)));
			

				$this->SetXY(12, 140); $this->Cell(185,6,utf8_decode("                                         MEMORIA FOTOGRÁFICA DEL BIEN ENTREGADO O SERVICIO PRESTADO "),1,0, 'L', true);
				
        		$this->Image($ruta_imagen,78,147,50,34); 
				$this->SetXY(12, 146); $this->Cell(185,36,"  ",1,0, 'L', false);

				$this->SetXY(12, 182); $this->Cell(185,6,utf8_decode("                                                    REVISIÓN TÉCNICA (UNIDAD DE DESARROLLO INTERNO) "),1,0, 'L', true);
					
				$this->SetXY(12, 188); $this->Cell(92,16,"  ",1,0, 'L', false); $this->Cell(93,16,"  ",1,1, 'L', false);

				$this->Text(24,191,utf8_decode(" DESCRIPCIÓN DE LO REVISADO:  ")); 


       $this->SetXY(14, 192); $this->Multicell(88,3,$descripcion_bien_revisado,0,'C');
        

        $this->Text(136,191,utf8_decode(" CONCLUSIONES:  "));

				$this->SetXY(12, 204); $this->Cell(185,14,"  ",1,0, 'L', false);

        $this->SetXY(106, 192); $this->Multicell(88,3,$conclusion_bien_revisado,0,'C');

				$this->Text(90,207,utf8_decode(" FIRMA Y SELLO:  "));
				$this->Line(115,207.5,91,207.5);
				$this->SetXY(12, 218); $this->Cell(185,18,"  ",1,0, 'L', false);
				 $this->SetFont('Arial','B',9);
				$this->Text(34,222,utf8_decode(" RECIBE CONFORME  "));
				 $this->SetFont('Arial','',9);

				$this->Text(33,226,utf8_decode(" NOMBRE Y APELLIDO "));

if($id_responsable_revision==''){ }



  else{
 $sqlConsultar3="SELECT nombre,apellido,cedula FROM responsable JOIN datos_personales as dp on dp.id_datos_personales=responsable.id_datos_personales WHERE id_responsable='".$id_responsable_revision."'";    
    $resultados3=pg_query($conx ,$sqlConsultar3);

while($row3=pg_fetch_array($resultados3)){


    $nombre_responsable=$row3['nombre'].' '.$row3['apellido'];
    $cedula_responsable=$row3['cedula'];
  }

        $this->SetXY(34, 217.5);$this->Cell(31,23,utf8_decode(strtoupper($nombre_responsable)),0,0, 'C', false);
        $this->SetXY(34, 221.5);$this->Cell(31,23,utf8_decode(strtoupper('V-'.$cedula_responsable)),0,0, 'C', false);
				}
				$this->SetFont('Arial','B',9);
				$this->Text(134,222,utf8_decode(" SUPERVISOR DE BIENES  "));
				 $this->SetFont('Arial','',9);
				$this->Text(137,226,utf8_decode(" NOMBRE Y APELLIDO "));
				$this->Text(145,230,utf8_decode(" RAILY TOVAR"));
				$this->Text(146,234,utf8_decode(" V-15482040 "));



    } 

    //Pie de página 
    function Footer() 
    { 
           
        $this->SetY(-15); 
        $this->SetFont('Arial','I',7); 
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
        $usuario=$_SESSION["nombreUsuario"];
        $this->Line(1,266,214,266);
        $this->Image('images/foot.jpg',34,254,150,10);  
        $this->Line(1,273,214,273); 
        $fecha= "fecha: ".date("d/m/Y"); 
        $hora="hora: ".date("g:i:s a"); 
        $this->Text(145,270.5,$fecha); 
        $this->Text(175,270.5,$hora); 
        $this->Text(26,270.5,"Reporte emitido por: ".$usuario); 
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
    $pdf->SetTopMargin(5.4); 
    $pdf->SetLeftMargin(4.5);        
    $pdf->AliasNbPages(); 
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


    $pdf->Output();     
?>