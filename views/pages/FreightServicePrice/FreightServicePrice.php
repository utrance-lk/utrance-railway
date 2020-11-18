
<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    
    <div class="main-01">
          <div class="main-02"><p class="p-ticket-head">Freight Service Price</p></div>
      </div>
      <p>FF = Furniture small Lots</p><br>
      <p >LL = Letters</p><br>
      <p>TWL = Light weight Articles which require more space</p><br>
      <p>MW = Machinery not weight over 50 kg</p><br>

<?php
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("FreightServicePrice.xlsx");

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


