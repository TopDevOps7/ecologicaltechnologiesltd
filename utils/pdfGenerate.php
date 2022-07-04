<?php

require "../vendor/autoload.php";
require "../lang/config.php";
require "dbconfig.php";
require "../utils/config.php";

if(!isset($_GET['id']) || !$isLogin) {
  header('location: ../user.php');
}

$passhash = "";
if(isset($_GET['passhash'])) {
  $passhash = $_GET['passhash'];
}

$user_id = $loginUser['id'];
if($passhash != "") {
  $user_ = $crud->getUserByHash($passhash, null, false);
  if($user_ != false) {
     $user_id = $user_['id'];
  }
}
$invest = $crud->getInvestDetails($_GET['id']);

if($invest == "" || (($role != 21 && $role != 1 && $role != 2) && $invest['user_id'] != $user_id)) {
  header('location: ../user.php');
}

$pdf = new \setasign\Fpdi\Tcpdf\Fpdi();
$pagecount = $pdf->setSourceFile('GWG_certificate_938DjeuHFue.pdf');
$tplidx = $pdf->importPage(1);
$pdf->AddPage("L");
$pdf->useTemplate($tplidx);
$pdf->SetTextColor(70, 128, 115);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->writeHTMLCell(60, 1, 15, 45, "#".$invest['cert_num'], 0, 1, 0, false, 'C', false);
$pdf->writeHTMLCell(60, 1, 221, 45, number_format($invest['size'], 0, '', "."), 0, 1, 0, false, 'C', false);
$pdf->SetFont('helvetica', 'B', 16);
$pdf->writeHTMLCell(200, 1, 50, 130, "*** " . number_format($invest['size'], 0, '', ".")." *** {$invest['pname']} TOKEN", 0, 1, 0, false, 'C', false);
$pdf->SetFont('blackjackpro', '', 50);
$pdf->writeHTMLCell(200, 1, 50, 97, "{$invest['fname']} {$invest['lname']}", 0, 1, 0, false, 'C', false);
$pdf->SetTextColor(150, 150, 150);
$date = date_create($invest['payed_date']);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->writeHTMLCell(65, 1, 33, 162, date_format($date, 'Y-m-d'), 0, 1, 0, false, 'C', false);
// download pdf file
$pdf->Output("Zertifikat_{$invest['cert_num']}.pdf", 'D');

?>