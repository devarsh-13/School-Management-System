<?php

  function char_only($string)
  {
    $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " ");
    $string = str_replace($numbers, '', $string);
    return $string;
  }

  require_once "../vendor/autoload.php";
  require "connection.php"; 
   
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\IOFactory;

  $filename = date('Y-m-d')."Student_details.xlsx";

  $details=["Gr no.","UID no.","Name","Class","Stream","Caste","Category","DOB","Admission date","Contact no.","Adhar no.","Home Address","Hostel Address","Handicapped","Describe","Remarks","Academic year"];

  $cols=["A1","B1","C1","D1","E1","F1","G1","H1","I1","J1","K1","L1","M1","N1","O1","P1","Q1"];


  $spreadsheet = new Spreadsheet();
  $Excel_writer = IOFactory::createWriter($spreadsheet,'Xlsx');
   
  $spreadsheet->setActiveSheetIndex(0);
  $activeSheet = $spreadsheet->getActiveSheet();
 
  
  for($i=0;$i<=sizeof($details)-1;$i++)
  {
    $activeSheet->setCellValue($cols[$i],$details[$i]);
  }

  $query = $Conn->query("SELECT * FROM `Students` WHERE `updated`='1' AND `is_deleted`='0' ORDER BY Class_id");

  $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

  if($query->num_rows > 0) 
  {
    $i = 2;
    while($row = $query->fetch_assoc())
    {
    	//Set cell value
     	
      $activeSheet->setCellValue('A'.$i , $row['S_grn']);

      //Set all cells in C to richtext to avoid bug in library
      $U=new \PhpOffice\PhpSpreadsheet\RichText\RichText();
      $U->createText($row['S_uidn']);

      $activeSheet->setCellValue('B'.$i , $U);

      $activeSheet->setCellValue('C'.$i , $row['S_name']);

      //Set cell value
      $class_id=$row['Class_id'];
      $q=mysqli_fetch_array(mysqli_query($Conn,"SELECT `C_no`,`Stream` FROM `Class` WHERE `Class_id`='$class_id'"));
      //Check class and eter class number abd stream
      if($q['C_no']==9 || $q['C_no']==10 )
      {
       	$activeSheet->setCellValue('D'.$i , $q['C_no']);
       	$activeSheet->setCellValue('E'.$i , '-');
      }
      elseif ($q['C_no']==11 || $q['C_no']==12 )
      {
      	$activeSheet->setCellValue('D'.$i , $q['C_no']);
       	$activeSheet->setCellValue('E'.$i , $q['Stream']);	
      }
      //Set cell value
      $activeSheet->setCellValue('F'.$i , $row['S_caste']);
      $activeSheet->setCellValue('G'.$i , $row['S_category']);
      $activeSheet->setCellValue('H'.$i , $row['S_dob']);
      $activeSheet->setCellValue('I'.$i , $row['S_ad_date']);
      $activeSheet->setCellValue('J'.$i , $row['S_contact']);

    	//Set all cells in L to richtext to avoid bug in library
    	$U=new \PhpOffice\PhpSpreadsheet\RichText\RichText();
      $U->createText($row['S_adharn']);

      $activeSheet->setCellValue('K'.$i , $U);

      $activeSheet->setCellValue('L'.$i , $row['S_home']);
      $activeSheet->setCellValue('M'.$i , $row['S_hostel']);
      $activeSheet->setCellValue('N'.$i , $row['S_handicapped']);
      $activeSheet->setCellValue('O'.$i , $row['S_describe']);
      $activeSheet->setCellValue('P'.$i , $row['S_remarks']);
      $activeSheet->setCellValue('Q'.$i , $row['Academic_year']);

      $i++;
    }
  }

  for($i=0;$i<=sizeof($cols)-1;$i++)
  {
  	$col=char_only($cols[$i]);
  	$spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(True);
  }



  $Excel_writer->save("Student_details/".$filename);

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename='."Student_details.xlsx");
  header('Cache-Control: max-age=0');
  $Excel_writer->save('php://output');

?>