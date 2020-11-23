
<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    
      <div class="main-01">
            <div class="main-02"><p class="p-ticket-head">Train Ticket Price</p></div>
        </div>
        
    <form action ="#" method="POST">
          <div class="pagination">
            <!--div class="div-class">
              <select class="select-routes" name="class" autofocus>
                    <option value="First Class">First Class</option>
                    <option value="Second Class">Second Class</option>
                    <option value="Third Class">Third Class</option>
               </select>
            </div!-->
            <div>
                 <select class="select-routes" name="routes" autofocus>
                    <option value="Beliatta To Colombo">Beliatta To Colombo</option>
                    <option value="Colombo To Badulla">Colombo To Badulla</option>
                    <option value="Colombo to Avissawella">Colombo to Avisawella</option>
               </select>
               
            </div>
              <div class="select-submit">
               <button class="select-div" name="submit">
                   Search
               </button>
              </div>
        </div>
     </form>
        <br>
        <br>
        <br>
        

<?php

if(isset($_POST['submit'])){
    $select_route=$_POST['routes'];
   
    if( $select_route === "Colombo to Avissawella"){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load("ticketPriceCA.xlsx");

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


    }
    if($select_route === "Beliatta To Colombo"){
      $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
      $reader->setReadDataOnly(TRUE);
      $spreadsheet = $reader->load("ticketPriceBC.xlsx");

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


  }

    if($select_route === "Colombo To Badulla"){
      $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
      $reader->setReadDataOnly(TRUE);
      $spreadsheet = $reader->load("ticketPriceCB.xlsx");
  
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

    }
    
}else{
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load("ticketPriceBC.xlsx");

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

}

?>
</body>
</html>
