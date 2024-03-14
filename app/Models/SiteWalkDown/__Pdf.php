<?php

namespace App\Models\SiteWalkDown;

use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;

class Pdf extends Fpdf
{
    protected $devicetype;
    protected $tagnumber;

    public function setHeaderparameter($devicetype, $tagnumber)
    {
        $this->devicetype = $devicetype;
        $this->tagnumber = $tagnumber;
    }

    public function Header()
    {
        $this->Image(public_path('theme/assets/images/ptcs.jpg'), 10, 17, 30, 18);
        $this->Image(public_path('theme/assets/images/phe.jpg'), 170, 20, 32, 13.5);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', 'BU', 15);
        $this->Cell(0, 7, 'VALVE INTEGRITY ASSESSMENT SERVICES REPORT', 0, 1, 'C', false);
        $this->SetFont('Arial', '', 10);
        $this->SetX(0);
        $this->Cell(210, 5, 'CONTRACT NO: 4710004011', 0, 1, 'C', false);
        $this->SetFont('Arial', 'B', 12);
        $this->SetX(0);
        $this->Cell(210, 10, $this->devicetype, 0, 1, 'C', false);
        $this->SetFont('Arial', '', 12);
        $this->SetX(0);
        $this->Cell(210, 8, 'Tag Number: ' . $this->tagnumber, 0, 0, 'C', false);
        $this->Line(10, 40, 200, 40);
        $this->Ln(10);
    }

    public function Footer()
    {
        $currentDate = Carbon::now()->format('d/m/Y');

        $this->SetY(-12);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 1, '', 'B', 1);
        $this->Cell(0, 5, 'Printed Date: '.$currentDate, 0, 0, 'L', false);
        $this->Cell(0, 5, 'Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'R', false);
    }
}
