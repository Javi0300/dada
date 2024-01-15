<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;

class headerfooter extends Fpdf
{
    function Header()
    {
        $cfdi = DB::table('cfdi_parametros as c')
        ->join('sucursales as s','s.IdSucursal','=','c.CFDISUCURSAL')
        ->select('c.CFDIRAZON','c.CFDIRFC','CFDITEL','c.CFDIFCALLE', 'c.CFDIFNEXT', 'c.CFDIFNINT','c.CFDIFCOL','c.CFDIFCP','c.CFDISUCURSAL','c.CFDIFPAIS', 'c.CFDIFESTADO', 'c.CFDIFMUNICIPIO','c.CFDITEL','s.descripcion')
        ->where('id','=','1')->first();
        // Logo       
        $this->SetFont('Arial','B',10);
        $this->Cell(0, 10, $cfdi->CFDIRAZON, 0, 0, 'C');   
        $this->Ln(3);
        $this->SetFont('Arial','',6);
        $this->Cell(0, 10, 'Sucursal:'.' '.$cfdi->descripcion.' Rfc:'.' '.$cfdi->CFDIRFC, 0, 0, 'C');        
        $this->Ln(2);
        $this->Cell(0, 10, $cfdi->CFDIFCALLE.' '. $cfdi->CFDIFNINT.' '. $cfdi->CFDIFCOL.' '. $cfdi->CFDIFCP.' Tel:'. $cfdi->CFDITEL, 0, 0, 'C');
        $this->Ln(2);
        $this->Cell(0, 10, $cfdi->CFDIFMUNICIPIO.','. $cfdi->CFDIFESTADO.' '. $cfdi->CFDIFPAIS, 0, 0, 'C');
        $this->Ln(10);        
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','B',6);
        // Número de página
        $this->Cell(20,10,'Page '.$this->PageNo().'/{nb}',0,0,'L');
        $this->Cell(0, 10, utf8_decode('Software para laboratorios clínicos || www.laboratorios-clinicos.com'), 0, 0, 'C');   
    }
    
}
