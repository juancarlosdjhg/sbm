<?php
  include('../php-barcode.php');
  require('fpdf.php');
  $var=$_GET['var'];
  
  // -------------------------------------------------- //
  //                      USEFUL
  // -------------------------------------------------- //
  
  class eFPDF extends FPDF{
    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }
  }

  // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 9;
  $marge    = -6;   // between barcode and hri in pixel
  $x        = 40;  // barcode center
  $y        = 16; // barcode center
  $height   = 16;   // barcode height in 1D ; module size in 2D
  $width    = 0.3;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  
  $len=strlen($var);
  for($i=0;$i<8;$i++){
    if($len<8){
      $var="0".$var;
      $len++;
    }}



  $code     = $var;
  $type     = 'code93';
  $black    = '000000'; // color in hexa
  
  
   // barcode, of course ;)
  // -------------------------------------------------- //
  //            ALLOCATE FPDF RESSOURCE
  // -------------------------------------------------- //
    
  $pdf = new eFPDF('P', 'mm', array(60, 34));


//$pdf =& new FPDF('P', 'mm', array(100, 100)); -> un pdf de 10x10 Centimetros. 


  $pdf->AddPage();
  
  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
  
  // -------------------------------------------------- //
  //                      HRI
  // -------------------------------------------------- //
  
  $pdf->SetFont('Arial','B',$fontSize);
  $pdf->SetTextColor(0, 0, 0);
  $len = $pdf->GetStringWidth($data['hri']);
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
  $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);
   $pdf->Text(8,3,utf8_decode('Contraloría del Estado Yaracuy'));

        $pdf->SetFont('Arial','B',12); 
   $pdf->Text(13,7,utf8_decode('Sección de Bienes'));

        $pdf->Image('logocey.jpg',1,7,18,18); 
  $pdf->Output();
?>