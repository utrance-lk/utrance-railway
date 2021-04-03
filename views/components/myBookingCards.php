<?php

function renderIntersectionCard($value){
    $i=0;
    $j=0;
   
    $arraySize=sizeof($value[0]);
    
  for($i=0; $i<$arraySize;$i++){
     
        
        $html="<div class='upcoming__trips--card margin-b-l'>";
        $html.="<div class='start-destination--box'>";

        $arra1=explode(",",$value[0][$i]['from_stations']);
        $arra2=explode(",",$value[0][$i]['to_stations']);
        $html.="<span>". $arra1[0]."</span>&nbsp;&ndash;&nbsp;<span>". $arra2[1] ."</span>";
        $html.="</div>";
        $html.="<div class='basic__details--box'>";
        $html.="<div class='date__box'>";
        $html.="<svg class='basic__detials--box-icon'>";
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use>";
        $html.="</svg>";
        $html.="<div class='basic__details--box-text'>" . $value[0][$i]['train_date'] . "</div></div></div>";
        $html.="<div class='train__details--box'>";
        $html.="<div class='train train__details--box-item'>";
        $html.="<svg class='train__detials--box-icon'>";
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use>";
        $html.="</svg>";
        $html.="<div class='train__details--box-text'>Train 1</div>";
        $html.="</div>";
        $html.="<div class='people__box train__details--box-item'>";
        $html.="<svg class='train__detials--box-icon'>";
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
        $html.="</svg>";
        //$html.="<div class='train__details--box-text'>" . $value[$i]['passengers'] . " people</div>";
        $arra1=explode(",",$value[0][$i]['total_passengers']);
        
        if($arra1[0] == 1){
            $html.="<div class='train__details--box-text'>". $arra1[0] . " Person </div>";
        }else if($arra1[0] > 1){
            $html.="<div class='train__details--box-text'>" .$arra1[0] . " Persons </div>";
        }
        $html.="</div>";
        $html.="<div class='class__box train__details--box-item'>";
        $arra1=explode(",",$value[0][$i]['class']);
        if($arra1[0] == 'secondClass'){
            $html.="<svg class='train__detials--box-icon'>";
            $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
            $html.="</svg>";
            $html.="<div class='train__details--box-text'>Second Class</div>";
        }
        if($arra1[0] == 'firstClass'){
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
        
        $html.="<div class='train__details--box-text'>Train 2</div>";
        $html.="</div>";
        $html.="<div class='people__box train__details--box-item'>";
        $html.="<svg class= 'train__detials--box-icon'>";
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
        $html.="</svg>";
        $arra1=explode(",",$value[0][$i]['total_passengers']);
        if($arra1[1] == 1){
            $html.="<div class='train__details--box-text'>". $arra1[1] . " Person </div>";
        }else if($arra1[1] > 1){
            $html.="<div class='train__details--box-text'>". $arra1[1] . " Persons </div>";
        }
        
        $html.="</div>";
        
        $arra1=explode(",",$value[0][$i]['class']);
        if($arra1[1] == 'secondClass'){
            $html.="<div class='class__box train__details--box-item'>";
            $html.="<svg class='train__detials--box-icon'>";
            $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
            $html.="</svg>";
            $html.="<div class='train__details--box-text'>Second Class</div>";
        }
        if($arra1[1] == 'firstClass'){
            $html.="<div class='class__box train__details--box-item'>";
            $html.="<svg class='train__detials--box-icon'>";
            $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
            $html.="</svg>";
            $html.="<div class='train__details--box-text'>First Class</div>";
        }
        
        $html.="</div>";     
        $html.="</div>";
        $arra1=explode(",",$value[0][$i]['total_amount']);
        
        $html.="<div class='price--box'>Rs " . $arra1[0] . "</div>";
        $html.="<div class='btn__container'>";
        
        $arra1=explode(",",$value[0][$i]['booking_id']);
        $html.="<a href='/utrance-railway/booked-tourIntersect?id1=".$arra1[0]."&id2=" . $arra1[1]. "' class='btn btn-round-blue margin-r-s margin-b-s'>";
        $html.="View more";
        $html.="</a></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML()); 
        

    }
    
}

    
   
     


    

function renderSinglePath($value){
    
    $i=0;
    $j=0;
    $sizeOfArray=sizeof($value[0]);
   
   
    for($i=0;$i<$sizeOfArray;$i++){
       
    $html="<div class='upcoming__trips--card margin-b-l' >";
    $html.= "<div class='start-destination--box'>";
    $html.="<span>". $value[0][$i]['from_station'] ."</span>&nbsp;&ndash;&nbsp;<span>". $value[0][$i]['to_station'] ."</span></div>";
    $html.="<div class='basic__details--box'>";
    $html.="<div class='date__box'>";
    $html.="<svg class='basic__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use></svg>";
    $html.="<div class='basic__details--box-text'>". $value[0][$i]['train_date']."</div></div></div>";
    $html.="<div class='train__details--box one__train'>";
    $html.="<div class='train train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use></svg>";
    $html.="<div class='train__details--box-text'>Train 1</div>";
    $html.="</div>";
    $html.="<div class='people__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
    $html.="</svg>";
    if($value[0][$i]['total_passengers'] == 1){
    $html.="<div class='train__details--box-text'>".$value[0][$i]['total_passengers']." Person</div></div>";
    }else if($value[0][$i]['total_passengers'] > 1){
        $html.="<div class='train__details--box-text'>".$value[0][$i]['total_passengers']." People</div></div>";
    }
    $html.="<div class='class__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    if($value[0][$i]['class'] == 'firstClass' ){
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
        $html.="</svg>";
        $html.="<div class='train__details--box-text'>First class</div></div></div>";
    }else if($value[0][$i]['class'] == 'secondClass' ){
        $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
        $html.="</svg>";
        $html.="<div class='train__details--box-text'>Second class</div></div></div>";
    }
    
    $html.="<div class='price--box'>Rs " .$value[0][$i]['total_amount'] ."</div>";
    $html.="<div class='btn__container'>";
    $html.="<a href='/utrance-railway/booked-tourDirect?id1=" . $value[0][$i]['booking_id'] ."' class='btn btn-round-blue margin-r-s margin-b-s'>View more</a></div></div>";
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());   
   
    }
  
   
}



?>