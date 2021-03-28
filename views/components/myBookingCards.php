<?php

function renderIntersectionCard($value){
    $i=0;
    $j=0;
    $arraySize=sizeof($value);
    
 
    
    for($i = 0; $i <$arraySize ; $i++) {   
        
        for($j = $i + 1; $j < $arraySize; $j++) {
             
            if($value[$i]['other_booking'] == $value[$j]['other_booking']) {
                
                $html="<div class='upcoming__trips--card margin-b-l'>";
                $html.="<div class='start-destination--box'>";
                $html.="<span>". $value[$i]['from_station'] ."</span>&nbsp;&ndash;&nbsp;<span>". $value[$j]['to_station'] ."</span>";
                $html.="</div>";
                $html.="<div class='basic__details--box'>";
                $html.="<div class='date__box'>";
                $html.="<svg class='basic__detials--box-icon'>";
                $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use>";
                $html.="</svg>";
                $html.="<div class='basic__details--box-text'>" . $value[$i]['train_date'] . "</div></div></div>";
                $html.="<div class='train__details--box'>";
                $html.="<div class='train train__details--box-item'>";
                $html.="<svg class='train__detials--box-icon'>";
                $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use>";
                $html.="</svg>";
                $html.="<div class='train__details--box-text'>" . $value[$i]['train_name'] . "</div>";
                $html.="</div>";
                $html.="<div class='people__box train__details--box-item'>";
                $html.="<svg class='train__detials--box-icon'>";
                $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
                $html.="</svg>";
                //$html.="<div class='train__details--box-text'>" . $value[$i]['passengers'] . " people</div>";
                if($value[$i]['passengers'] == 1){
                    $html.="<div class='train__details--box-text'>". $value[$i]['passengers'] . " Person </div>";
                }else if($value[$i]['passengers'] > 1){
                    $html.="<div class='train__details--box-text'>". $value[$i]['passengers'] . " Persons </div>";
                }
                $html.="</div>";
                $html.="<div class='class__box train__details--box-item'>";
                if($value[$j]['class'] == 'secondClass'){
                    $html.="<svg class='train__detials--box-icon'>";
                    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
                    $html.="</svg>";
                    $html.="<div class='train__details--box-text'>Second Class</div>";
                }
                if($value[$j]['class'] == 'firstClass'){
                    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
                    $html.="</svg>";
                    $html.="<div class='train__details--box-text'>Second Class</div>";
                }
                $html.="</div>";     
                $html.="</div>";
                $html.="<div class='train__details--box'>";
                $html.="<div class='train train__details--box-item'>";
                $html.="<svg class='train__detials--box-icon'>";
                $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use>";
                $html.="</svg>";
                
                $html.="<div class='train__details--box-text'>". $value[$j]['train_name'] . "</div>";
                $html.="</div>";
                $html.="<div class='people__box train__details--box-item'>";
                $html.="<svg class= 'train__detials--box-icon'>";
                $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
                $html.="</svg>";
                if($value[$j]['passengers'] == 1){
                    $html.="<div class='train__details--box-text'>". $value[$j]['passengers'] . " Person </div>";
                }else if($value[$j]['passengers'] > 1){
                    $html.="<div class='train__details--box-text'>". $value[$j]['passengers'] . " Persons </div>";
                }
                
                $html.="</div>";
                $html.="<div class='class__box train__details--box-item'>";
                $html.="<svg class='train__detials--box-icon'>";
                if($value[$j]['class'] == 'secondClass'){
                    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
                    $html.="</svg>";
                    $html.="<div class='train__details--box-text'>Second Class</div>";
                }
                if($value[$j]['class'] == 'firstClass'){
                    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
                    $html.="</svg>";
                    $html.="<div class='train__details--box-text'>Second Class</div>";
                }
                
                $html.="</div>";     
                $html.="</div>";
                $html.="<div class='price--box'>Rs " . $value[$j]['total_amount'] . "</div>";
                $html.="<div class='btn__container'>";
                
                $html.="<a href='/utrance-railway/booked-tourIntersect?id1=".$value[$i]['id']."&id2=" . $value[$j]['id']. "' class='btn btn-round-blue margin-r-s margin-b-s'>";
                $html.="View more";
                $html.="</a></div>";
                return $html;
                
                
                
            }   
        }
                   
        
    }  
    //$html.="</div>";
    
    } 


    
    
   

















    



function renderSinglePath($value,$k){
    
    $i=0;
    $j=0;
    $sizeOfArray=sizeof($value);
   
    
    for($i=0;$i<$sizeOfArray;$i++){
        
    $html="<div class='upcoming__trips--card margin-b-l' >";
    $html.= "<div class='start-destination--box'>";
    $html.="<span>". $value[$i]['from_station']."</span>&nbsp;&ndash;&nbsp;<span>". $value[$i]['to_station']."</span></div>";
    $html.="<div class='basic__details--box'>";
    $html.="<div class='date__box'>";
    $html.="<svg class='basic__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use></svg>";
    $html.="<div class='basic__details--box-text'>". $value[$i]['train_date']."</div></div></div>";
    $html.="<div class='train__details--box one__train'>";
    $html.="<div class='train train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use></svg>";
    $html.="<div class='train__details--box-text'>". $value[$i]['train_name']."</div>";
    $html.="</div>";
    $html.="<div class='people__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
    $html.="</svg>";
    if($value[$i]['passengers'] == 1){
    $html.="<div class='train__details--box-text'>".$value[$i]['passengers']." Person</div></div>";
    }else if($value[$i]['passengers'] > 1){
        $html.="<div class='train__details--box-text'>".$value[$i]['passengers']." People</div></div>";
    }
    $html.="<div class='class__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    if($value[$i]['class'] == 'firstClass' ){
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
        $html.="</svg>";
        $html.="<div class='train__details--box-text'>First class</div></div></div>";
    }else if($value[$i]['class'] == 'secondClass' ){
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
        $html.="</svg>";
        $html.="<div class='train__details--box-text'>Second class</div></div></div>";
    }
    
    $html.="<div class='price--box'>Rs " .$value[$i]['total_amount'] ."</div>";
    $html.="<div class='btn__container'>";
    $html.="<a href='/utrance-railway/booked-tourDirect?id1=" . $value[$i]['id'] ."' class='btn btn-round-blue margin-r-s margin-b-s'>View more</a></div></div>";
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());   
   
    }
  
   
}



?>