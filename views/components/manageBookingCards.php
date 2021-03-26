<?php
$count=1;
function renderIntersectionCard($value,$other_reference){
    $i=0;
    
    $size=sizeof($other_reference);
    for($i=0;$i<$size;$i++){
        if(($value['other_bokings']==$other_reference[$i]) && $count!=2){
            $count++;


        }
    }
    $html="<div class='upcoming__trips--cards-container'>";
    $html.="<div class='upcoming__trips--card'>";
    $html.="<div class='start-destination--box'>";
    $html.="<span>Matara</span>&nbsp;&ndash;&nbsp;<span>Kandy</span>";
    $html.="</div>";
    $html.="<div class='basic__details--box'>";
    $html.="<div class='date__box'>";
    $html.="<svg class='basic__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use>";
    $html.="</svg>";
    $html.="<div class='basic__details--box-text'>";
    $html.="28th Nov 2020";
    $html.="</div>";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='train__details--box'>";
    $html.="<div class='train train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="Dakshina Intercity ";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='people__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="5 people";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='class__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="First class";
    $html.="</div>";
    $html.="</div>";     
    $html.="</div>";
    $html.="<div class='train__details--box'>";
    $html.="<div class='train train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="Colombo - Kandy (Intercity)";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='people__box train__details--box-item'>";
    $html.="<svg class= 'train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="4 people";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='class__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-neutral'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>";
    $html.="Second class";
    $html.="</div>";
    $html.="</div>";     
    $html.="</div>";
    $html.="<div class='price--box'>";
    $html.="Rs 500";
    $html.="</div>";
    $html.="<div class='btn__container'>";
    $html.="<a href='/utrance-railway/booked-tour' class='btn btn-round-blue margin-r-s margin-b-s'>";
    $html.="View more";
    $html.="</a>";
    $html.="</div>";
    $html.="</div>";




















    
}


function renderSinglePath(){

    $html="<div class='upcoming__trips--card'>";
    $html.= "<div class='start-destination--box'>;
                    <span>Matara</span>&nbsp;&ndash;&nbsp;<span>Kandy</span>
                </div>";
    $html.="<div class='basic__details--box'>";
    $html.="<div class='date__box'>";
    $html.="<svg class='basic__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-calendar'></use></svg>";
    $html.="<div class='basic__details--box-text'>28th Nov 2020</div></div></div>";
    $html.="<div class='train__details--box one__train'>";
    $html.="<div class='train train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-directions_train'></use></svg>";
    $html.="<div class='train__details--box-text'>Dakshina Intercity";
    $html.="</div>";
    $html.="</div>";
    $html.="<div class='people__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-users'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>5 people</div></div>";
    $html.="<div class='class__box train__details--box-item'>";
    $html.="<svg class='train__detials--box-icon'>";
    $html.="<use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-emoji-happy'></use>";
    $html.="</svg>";
    $html.="<div class='train__details--box-text'>First class</div></div></div>";
    $html.="<div class='price--box'>Rs 500</div>";
    $html.="<div class='btn__container'>";
    $html.="<a href='/utrance-railway/booked-tour' class='btn btn-round-blue margin-r-s margin-b-s'>View more</a></div></div>";
            


}
?>