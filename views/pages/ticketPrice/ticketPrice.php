<!--?php
require '../vendor/autoload.php';

//require_once "..\vendor\phpoffice\phpexcel\Classes\PHPExcel.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



$excel1=new Spreadsheet();
$inputFileName = 'ticketPrice.xlsx';
$excel = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
//$excel.IOFactory::load('ticketPrice.xlsx');
//$excel=PhpSpreadsheet_IOFactory::load($file);
//$excel.PHPSpreadsheet_IOFactory::load('ticketPrice.xlsx');

$excel->setActiveSheetIndex(0);

echo "<table>";
$i=5;
var_dump($i);

$k= $excel1->getActiveSheet()->getCell('A'.$i)->getValue();
var_dump($k);
/*while( $excel->getActiveSheet()->getCell('A'.$i)->getValue() !=""){
  
  
    $station= $excel->getActiveSheet()->getCell('A'.$i)->getValue();
     $Matara= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
    $Ahangama= $excel->getActiveSheet()->getCell('C'.$i)->getValue();
    $Habaraduwa= $excel->getActiveSheet()->getCell('D'.$i)->getValue();
    $Galle= $excel->getActiveSheet()->getCell('E'.$i)->getValue();
    var_dump($station);
    $i++;
    echo "
      <tr> 
           <td>" .$station."</td>
           <td>" .$Matara."</td>
           <td>" .$Ahangama."</td>
           <td>" .$Habaraduwa."</td>
           <td>" .$Galle."</td>
    </tr>
    ";
    $i++;

}*/

echo"</table>";
?!-->
<?php 
  require '../vendor/autoload.php';
// require_once('path/vendor/autoload.php'); 
// Load an .xlsx file 
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('ticketPrice.xlsx'); 
   
// Store data from the activeSheet to the varibale 
// in the form of Array 
   
$data = array(1,$spreadsheet->getActiveSheet() 
            ->toArray(null,true,true,true)); 
  
// Display the sheet content 
var_dump($data); 
?> 
