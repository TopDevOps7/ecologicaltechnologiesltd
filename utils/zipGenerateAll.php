<?php

require "../vendor/autoload.php";
require "../lang/config.php";
require "dbconfig.php";
require "../utils/config.php";

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Filter Customer Data
function filterCustomerData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

if(!$isLogin) {
  header('location: ../user.php');
}

if($role != 21) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$user_id = $loginUser['id'];
$investAll = $crud->getInvestDetailsFromHash();
$addressData = [];
// $addressDataDOC = [];
// $addressDataPDF = "";
// $addressData[] = ['User ID', 'Name', 'Address', 'Zip', 'City'];
$temp_file_name = 'temp/my-pdf.zip';
$pdfdir = "{$_SERVER['DOCUMENT_ROOT']}/utils/temp";
// $pdfdir = "{$_SERVER['DOCUMENT_ROOT']}";
$zip = new ZipArchive();
$file = $temp_file_name;
$zip->open($file, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE);
// $pdf1 = new \setasign\Fpdi\Tcpdf\Fpdi();
// $pdf1->SetPrintHeader(false);
// $pdf1->SetPrintFooter(false);
// $pdf1->SetMargins(24, 50, -1, true);
// $pdf1->SetFont('calibri_', '', 11);

// Creating the new document...
// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $phpWord->setDefaultParagraphStyle(array('spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),'lineHeight' => 1));

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
// $section = $phpWord->addSection(array('marginTop' => 2900));

// Adding Text element with font customized using named font style...
// $titleFontStyle = 'titleFontStyle';
// $phpWord->addFontStyle(
//     $titleFontStyle,
//     array('name' => 'Calibri', 'size' => 11, 'bold' => true, 'underline' => 'single')
// );

// $valueFontStyle = 'valueFontStyle';
// $phpWord->addFontStyle(
//     $valueFontStyle,
//     array('name' => 'Calibri', 'size' => 11)
// );

foreach ($investAll as $key => $invest) {

  // if($invest['re_payed'] == 1) {
  //   continue;
  // }
  
  if($invest['user_id'] == 7 || $invest['user_id'] == 58 || $invest['user_id'] == 36703) {
    continue;
  }
  
  $addressData[] = [$invest['user_id'], "{$invest['fname']} {$invest['lname']}", $invest['address'], $invest['zip'], $invest['city'], $invest['id'], $invest['tracking_id']];

  // if(isset($invest['tracking_id']) && $invest['tracking_id'] != "") {
  //   continue;
  // }

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
  $pdf->writeHTMLCell(200, 1, 50, 130, "*** " . number_format($invest['size'], 0, '', ".")." *** {$invest['project_name']} TOKEN", 0, 1, 0, false, 'C', false);
  $pdf->SetFont('blackjackpro', '', 50);
  $pdf->writeHTMLCell(200, 1, 50, 97, "{$invest['fname']} {$invest['lname']}", 0, 1, 0, false, 'C', false);
  $pdf->SetTextColor(150, 150, 150);
  $date = date_create($invest['payed_date']);
  $pdf->SetFont('helvetica', 'B', 13);
  $pdf->writeHTMLCell(65, 1, 33, 162, date_format($date, 'Y-m-d'), 0, 1, 0, false, 'C', false);
  // save pdf file
  $pdf->Output("$pdfdir/Zertifikat_{$invest['cert_num']}.pdf", 'F');

  $zip->addFile("$pdfdir/Zertifikat_{$invest['cert_num']}.pdf", "Zertifikat_{$invest['cert_num']}.pdf");

  // $pdf1->AddPage();
  // $pdf1->writeHTMLCell(0, 1, 24, 50, $addressDataPDF, 0, 1, 0, false, '', false);
  // $addressDataDOC[] = [$invest['user_id'], "{$invest['fname']} {$invest['lname']}", $invest['address'], $invest['zip'], $invest['city'], $invest['id'], $invest['tracking_id'], $invest['gender'], $invest['country_name']];
  // Adding Text element with font customized inline...
  
}

// $userdupe=array();

// foreach ($addressData as $index => $t) {
//   if (isset($userdupe[$t[0]])) {
//     unset($addressData[$index]);
//     continue;
//   }
//   $userdupe[$t[0]]=true;
// }

// $userdupe=array();

// foreach ($addressDataDOC as $index => $t) {
//   if (isset($userdupe[$t[0]])) {
//     unset($addressDataDOC[$index]);
//     continue;
//   }
//   $userdupe[$t[0]]=true;
// }

// foreach ($addressDataDOC as $index => $t) {
//     $section->addText(
//       'Einschreiben / Persönlich',
//       $titleFontStyle
//   );

//   $section->addText(
//       "{$t[7]}",
//       $valueFontStyle
//   );
//   $section->addText(
//       "{$t[1]}",
//       $valueFontStyle
//   );
//   $section->addText(
//       "{$t[2]}",
//       $valueFontStyle
//   );
//   $section->addText(
//       "{$t[3]} {$t[4]}",
//       $valueFontStyle
//   );
//   $section->addText(
//       "{$t[8]}",
//       $valueFontStyle
//   );
  
//   if ($index < count($addressDataDOC) - 1)
//   {
//     $section->addPageBreak();
//   }
// }

// // save pdf file
// // $pdf1->Output("$pdfdir/Address_All.pdf", 'F');

// // Saving the document as OOXML file...
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save("$pdfdir/Address_All.docx");
// $zip->addFile("$pdfdir/Address_All.docx", "Adressen.docx");

$data = [];

foreach ($addressData as $index => $t) {
    $data[]=[$t[5], $t[1], $t[6]];
    $data[]=["", $t[2]];
    $data[]=["", "{$t[3]} {$t[4]}"];
    $data[]=["", ""];
}

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->fromArray($data, NULL,'A1');
$spreadsheet->getActiveSheet()->setTitle("Adressen");

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save("$pdfdir/address.xlsx");

$date = date("y-m-d_H-i");

$zip->addFile("$pdfdir/address.xlsx", "Adressen_komplett.xlsx");

$zip->close();

header('Content-type: application/zip');
header('Content-Disposition: attachment; filename="' . $date . '_Zertifikate_komplett.zip"');
readfile($temp_file_name);
?>