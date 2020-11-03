<div class="load-content-container">
    <div class="load-content">
        <?php
            if(isset($users)){
                foreach($users as $key=>$value){
                 
                    $html ="<div class='load-content--settings'> 
                    <div class='content-title'>      
                
                    ";
                    $html .="<p>" .$value['train_id'] . "</p>";
                }
            }  


        ?>
          
    </div>
</div>