<?php
error_reporting(0);
ob_start();
    function char_only($string)
    {
      $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " ");
      $string = str_replace($numbers, '', $string);
      return $string;
     }
                
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$details=["Name","DOB","Degree","Appointment Date","Joining Date","Retire Date","Contact No."];

$cols=["A1","B1","C1","D1","E1","F1","G1"];

for($i=0;$i<=sizeof($details)-1;$i++)
{
	$sheet->setCellValue($cols[$i],$details[$i]);
	$row=char_only($cols[$i]);
	
	$spreadsheet->getActiveSheet()->getColumnDimension($row)->setAutoSize(True);	
}

$spreadsheet->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode('YYYY-MM-DD');
$spreadsheet->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode('YYYY-MM-DD');
$spreadsheet->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode('YYYY-MM-DD');
$spreadsheet->getActiveSheet()->getStyle('F')->getNumberFormat()->setFormatCode('YYYY-MM-DD');

ob_clean();

$filename="Teacher_details.Xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.$filename);

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

die();


?>	