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

<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    
      <div class="main-01">
            <div class="main-02"><p class="p-ticket-head">Train Ticket Price</p></div>
        </div>

<?php
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("ticketPrice.xlsx");

$worksheet = $spreadsheet->getActiveSheet();

echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                                                       //    even if a cell value is not set.
                                                       // By default, only cells that have a value
                                                       //    set will be iterated.
    foreach ($cellIterator as $cell) {
        echo '<td>' .
             $cell->getValue() .
             '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;
?>
</body>
</html>