<?php

require "../vendor/autoload.php";
require "../lang/config.php";
require "dbconfig.php";
require "../utils/config.php";

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;

// Filter Customer Data
function filterCustomerData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$role = "";
if($isLogin) {
    $role = $loginUser['role'];
    $user_id = $_GET['user_id'] ?? "";

    if($role == 1 || $role == 20) {
        $date = date('y-m-d_H-i');
        $fileName = "{$date}_Greenwave Kunden Liste.xlsx";
        if($role == 20) {
            $fileName = "{$date}_[Paymaster] Investments.xlsx";
        }
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header("Content-Disposition: attachment; filename=\"$file_name\"");
        // header("Content-Type: application/vnd.ms-excel");

        $investment_data = $crud->getInvestmentData($user_id);
        \PhpOffice\PhpSpreadsheet\Settings::setLocale("de");
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        // if($role == 1) {
        //     $investment_data[0][14] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][14]);
        //     $investment_data[0][15] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][15]);
        //     $investment_data[0][17] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][17]);
        //     $investment_data[0][19] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][19]);
        // } else {
        //     $investment_data[0][10] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][10]);
        //     $investment_data[0][11] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][11]);
        //     $investment_data[0][13] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][13]);
        //     $investment_data[0][15] = Calculation::getInstance()->_translateFormulaToLocale($investment_data[0][15]);
        // }
        $spreadsheet->getActiveSheet()->fromArray($investment_data, NULL,'A1');
        $spreadsheet->getActiveSheet()->getStyle('3:3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A3:T3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00DDDDDD');
        // if($role == 1) {
        //     $spreadsheet->getActiveSheet()->getStyle('A3:W3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00DDDDDD');
        //     $spreadsheet->getActiveSheet()->setTitle("Kundenliste");
        //     $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('U')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('O3:W3')->getAlignment()->setHorizontal('center');
        //     $spreadsheet->getActiveSheet()->getStyle('A1');
        // } else {
            $spreadsheet->getActiveSheet()->setTitle("Investments");
            $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('L')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('R')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('A3:S3')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('A1');
        // }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        // header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        exit;

    } else {
        echo "permission error";
    }
} else {
    echo "not login.";
    exit;
}
?>