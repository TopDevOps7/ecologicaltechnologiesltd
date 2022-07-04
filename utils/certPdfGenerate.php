<?php
require "../vendor/autoload.php";

class CustomPdfGenerator extends TCPDF 
{
    public function Header() 
    {
        // $image_file = '../assets/images/logo.png';
        // $this->Image($image_file, 10, 3, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // $this->SetFont('helvetica', 'B', 20);
        // $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // $this->Ln();
    }

    public function Footer() 
    {
        // $this->SetY(-15);
        // $this->SetFont('helvetica', 'I', 15);
        // $this->Cell(0, 10, 'Green Wave Materials Support Team.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function printBody($data)
    {
      $image_file = '../assets/images/certback.png';
      $this->SetAutoPageBreak(false, 0);
      $this->Image($image_file, 5, 5, $this->getPageWidth() - 10, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      $this->SetTextColor(70, 128, 115);
      $this->SetFont('helvetica', 'B', 13);
      $this->writeHTMLCell(60, 1, 15, 45, "#".$data['cert_num'], 0, 1, 0, false, 'C', false);
      $this->writeHTMLCell(60, 1, 221, 45, number_format($data['size'], 0, ',', "."), 0, 1, 0, false, 'C', false);
      $this->SetFont('helvetica', 'B', 16);
      $this->writeHTMLCell(200, 1, 50, 130, "*** " . number_format($data['size'], 0, ',', ".")." *** {$data['pname']} TOKEN", 0, 1, 0, false, 'C', false);
      $this->SetFont('blackjack', '', 50);
      $this->writeHTMLCell(200, 1, 50, 97, "{$data['fname']} {$data['lname']}", 0, 1, 0, false, 'C', false);
      $this->SetTextColor(150, 150, 150);
      $date = date_create($data['payed_date']);
      $this->SetFont('helvetica', 'B', 13);
      $this->writeHTMLCell(65, 1, 33, 162, date_format($date, 'Y-m-d'), 0, 1, 0, false, 'C', false);
    }
}
?>