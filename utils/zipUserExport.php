<?php

require "../vendor/autoload.php";
require "../lang/config.php";
require "dbconfig.php";
require "../utils/config.php";

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

if(!$isLogin) {
  header('location: ../user.php');
}

if($role != 1) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$type = $_GET['type'] ?? "";

function filterFileName($userId, $name = "")
{
  if($name == "") return "";
  return explode("_{$userId}_", $name)[1];
}

$clients = $crud->getAllClientData();

$temp_file_name = 'temp/clients.zip';
// $rootDir = "{$_SERVER['DOCUMENT_ROOT']}/utils/temp";
$rootDir = "{$_SERVER['DOCUMENT_ROOT']}/clients/uploads";
$zip = new ZipArchive();
$file = $temp_file_name;
$zip->open($file, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$excelData = [];
if($type == "") {
  $excelData[] = ["ID", "Vorname", "Nachname", "Adresse", "PLZ", "Stadt", "E-Mail", "Telefon", "Payed", "KYC 1", "KYC 2", "NDA", "Bank"];
} else {
  $excelData[] = ["ID", "Vorname", "Nachname", "Adresse", "PLZ", "Stadt", "E-Mail", "Telefon", "Payed", "KYC 1", "KYC 2"]; 
}
foreach ($clients as $key => $client) {
  $prefix = "";
  if(count($client['invest']) > 0 && $type == "") {
    $prefix = "K_";
  }
  $user = $client['user'];
  // $kyc1 = array_filter($client['kyc'], function ($v, $k)
  // {
  //   return $k == "file_type" && $v == 1;
  // }, ARRAY_FILTER_USE_BOTH);
  // $kyc2 = array_filter($client['kyc'], function ($v, $k)
  // {
  //   return $k == "file_type" && $v == 2;
  // }, ARRAY_FILTER_USE_BOTH);
  // $kyc3 = array_filter($client['kyc'], function ($v, $k)
  // {
  //   return $k == "file_type" && $v == 3;
  // }, ARRAY_FILTER_USE_BOTH);
  // $kycName1 = "";
  // $kycName2 = "";
  // $kycName3 = "";
  
  // if(count($kyc1) > 0) {
  //   $kycName1 = $kyc1[0]['file_name'];
  // }
  // if(count($kyc2) > 0) {
  //   $kycName2 = $kyc2[0]['file_name'];
  // }
  // if(count($kyc3) > 0) {
  //   $kycName3 = $kyc3[0]['file_name'];
  // }

  $excelData[] = [$user['id'], $user["fname"], $user["lname"], $user["address"], $user["zip"], $user["city"], $user["email"], $user["tel_1"], $user['payed'], "", "", "", $prefix == "K_" ? "K" : "" ];
  if ($type == "") {
  $spreadsheet->getActiveSheet()->getStyle("J".(count($excelData)).":L".(count($excelData))."")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF0000');
  $spreadsheet->getActiveSheet()->getStyle("J".(count($excelData)).":L".(count($excelData)))->getAlignment()->setHorizontal('center');
  } else {
    $spreadsheet->getActiveSheet()->getStyle("J".(count($excelData)).":K".(count($excelData))."")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF0000');
    $spreadsheet->getActiveSheet()->getStyle("J".(count($excelData)).":K".(count($excelData)))->getAlignment()->setHorizontal('center');
  }
  if(count($client['kyc']) > 0) {
    foreach ($client['kyc'] as $key => $file) {
      if ($type == "") {
        $zip->addEmptyDir("$prefix{$user['id']}_{$user['lname']}, {$user['fname']}");
        $zip->addFile("$rootDir/{$file['file_name']}", "$prefix{$user['id']}_{$user['lname']}, {$user['fname']}/".filterFileName($user['id'], $file['file_name']));
        $excelData[count($excelData) - 1][8 + $file['file_type']] = "×";
        $col = ["J", "K", "L"];
        $spreadsheet->getActiveSheet()->getStyle("{$col[$file['file_type'] - 1]}".(count($excelData))."")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFFFF');
      } else {
        if($file['file_type'] != 3) {
          $zip->addEmptyDir("$prefix{$user['id']}_{$user['lname']}, {$user['fname']}");
          $zip->addFile("$rootDir/{$file['file_name']}", "$prefix{$user['id']}_{$user['lname']}, {$user['fname']}/".filterFileName($user['id'], $file['file_name']));
          $excelData[count($excelData) - 1][8 + $file['file_type']] = "×";
          $col = ["J", "K"];
          $spreadsheet->getActiveSheet()->getStyle("{$col[$file['file_type'] - 1]}".(count($excelData))."")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FFFFFF');
        } else {
          $zip->addEmptyDir("{$prefix}_{$user['id']}_{$user['lname']}, {$user['fname']}");
        }
      }
    }
  } else {
    $zip->addEmptyDir("{$prefix}_{$user['id']}_{$user['lname']}, {$user['fname']}");
  }
  $spreadsheet
    ->getActiveSheet()
    ->getStyle("J".(count($excelData)).":L".(count($excelData)))
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('00D9D9D9'));
}

$spreadsheet->getActiveSheet()->fromArray($excelData, NULL,'A1');
$spreadsheet->getActiveSheet()->setTitle("Clients");
$spreadsheet->getActiveSheet()->getStyle('1:1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal('center');
if($type == "") {
  $spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00DDDDDD');
} else {
  $spreadsheet->getActiveSheet()->getStyle('A1:K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00DDDDDD');
}
$spreadsheet->getActiveSheet()->getStyle('H')->getNumberFormat()
    ->setFormatCode('@');
$spreadsheet->getActiveSheet()->getStyle('A1');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save("{$_SERVER['DOCUMENT_ROOT']}/utils/temp/clients.xlsx");

$zip->addFile("{$_SERVER['DOCUMENT_ROOT']}/utils/temp/clients.xlsx", "Clients.xlsx");

$zip->close();

$date = date('y-m-d_H-i');

header('Content-type: application/zip');
header('Content-Disposition: attachment; filename="' . $date . '_KYC'. $type .'.zip"');
readfile($temp_file_name);
?>