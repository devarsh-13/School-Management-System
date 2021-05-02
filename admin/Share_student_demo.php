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

$details=["Gr no.","UID no.","Name","Class","Stream","Caste","Category","DOB","Admission date","Contact no.","Adhar no.","Home Address","Hostel Address","Handicapped","Describe","Remarks","Academic year"];
$cols=["A1","B1","C1","D1","E1","F1","G1","H1","I1","J1","K1","L1","M1","N1","O1","P1","Q1","R1"];

for($i=0;$i<=sizeof($details)-1;$i++)
{
	$sheet->setCellValue($cols[$i],$details[$i]);
	$row=char_only($cols[$i]);
	
	if($i>=8 && $i<=17)
	{
		$spreadsheet->getActiveSheet()->getColumnDimension($row)->setAutoSize(True);	
	}
}

$spreadsheet->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode('YYYY-MM-DD');
$spreadsheet->getActiveSheet()->getStyle('I')->getNumberFormat()->setFormatCode('YYYY-MM-DD');

ob_clean();

$filename="Student_details.Xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.$filename);

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

die();


?>	