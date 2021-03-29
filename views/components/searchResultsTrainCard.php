<?php

function renderDirectPathCard($value, $option)
{

  // date validating
  $dateTimeStr = $value['when'] . ' ' . $value['fssdt'];
  $d1 = new DateTime($dateTimeStr);
  $currentDate = new DateTime(date('m/d/Y h:i:s a', strtotime('+30 minutes')));
  $isEligible = $d1 > $currentDate;

  // ticket price validating
  $isPriceAvailable = false;
  if($value['train1Price']) {
    $isPriceAvailable = true;
  }

    $html = "<div class='search-results-train-card search-results-train-card--small'>
                <div class='search-results-train-card__main'>
                    <div class='search-results-train-card__primary'>
                        <div class='search-results-train-card__detailbox'>
                            <div class='search-results-train-card__train-time'>";

    $timeDecide = timeDecider(substr($value['fssdt'], 0, 2));

    $html .= "<span>  $timeDecide[0]</span>
              <span> : </span>";

    $html .= "<span>" . substr($value['fssdt'], 3, 2) . "</span>";

    $html .= "<span>  $timeDecide[1] </span>
              <span> - </span>";

    $timeDecide = timeDecider(substr($value['tseat'], 0, 2));

    $html .= "<span> $timeDecide[0] </span>
                <span> : </span>";

    $html .= "<span>" . substr($value['tseat'], 3, 2) . "</span>";

    $html .= "<span> $timeDecide[1] </span></div>
                <div class='search-results-train-card__train-name'>";
    $train_id=$value['train_id'];
    $html .= "<a href='/utrance-railway/view-train?train_id=$train_id'>" . $value['train_name'] . "</a></div>";
    $html .= "<div>";
    $html .= "<span>" . $value['fssn'] . "</span>";
    $html .= "<span> to </span>";
    $html .= "<span>" . $value['tsen'] . "</span></div></div>";

    $html .= "<div class='search-results-train-card__durationbox'>";
    $html .= "<span>" . substr($value['total_time'], 0, 2) . "</span>";
    $html .= "<span> h </span>";
    $html .= "<span>" . substr($value['total_time'], 3, 2) . "</span>";
    $html .= "<span> min </span></div></div>";
    $html .= "</div>";

    $html .= "<div class='search-results-train-card__sub'>";

    $html .= "<div class='search-results-train-card__classbox'>";

    $option = "op" . $option;
    $_SESSION[$option] = $value;

    if($isEligible && $isPriceAvailable) {
      $html .= "<a href='/utrance-railway/book-seats?op=$option&mode=direct' class='btn-square-no-bg'><p>Proceed</p></a>";
    } else if(!$isPriceAvailable) {
      $html .= "<div class='btn-square-no-bg--disabled'><p>Ticket Prices Not Available</p></div>";
    }
     else {
      $html .= "<div class='btn-square-no-bg--disabled'><p>Not Available</p></div>";
    }

    $html .= "</div></div></div>";

    return $html;
}

function renderIntersectCard($value, $option)
{

  // date validating
  $dateTimeStr1 = $value['when'] . ' ' . $value['fssdt'];
  $d1 = new DateTime($dateTimeStr1);
  $dateTimeStr2 = $value['when'] . ' ' . $value['tsidt'];
  $d2 = new DateTime($dateTimeStr2);
  $currentDate = new DateTime(date('m/d/Y h:i:s a', strtotime('+30 minutes')));
  $isEligible = $d1 > $currentDate && $d2 > $currentDate;

  // ticket price validating
$isPriceAvailable = false;
if ($value['train1Price'] && $value['train2Price']) {
    $isPriceAvailable = true;
}


    $html = "<div class='search-results-train-card search-results-train-card--big'>
                <div class='search-results-train-card__main'>
                <div class='search-results-train-card__primary'>
                <div class='search-results-train-card__detailbox'>
                <div class='search-results-train-card__train-time'>";

    $timeDecide = timeDecider(substr($value['fssdt'], 0, 2));

    $html .= "<span>  $timeDecide[0] </span>";
    $html .= "<span> : </span>";
    $html .= "<span>" . substr($value['fssdt'], 3, 2) . "</span>";
    $html .= "<span>  $timeDecide[1] </span>";
    $html .= "<span> - </span>";

    $timeDecide = timeDecider(substr($value['fsiat'], 0, 2));

    $html .= "<span> $timeDecide[0] </span>";
    $html .= "<span> : </span>";
    $html .= "<span>" . substr($value['fsiat'], 3, 2) . "</span>";
    $html .= "<span> $timeDecide[1] </span></div>";
    $train_id=$value['frti'];
    $html .= "<div class='search-results-train-card__train-name'>";
    $html .= "<a href='/utrance-railway/view-train?train_id=$train_id'>" . $value['frtn'] . "</a></div>";
    $html .= "<div class='search__card-detailbox--train-journey'>";
    $html .= "<span>" . $value['fssn'] . "</span>";
    $html .= "<span> to </span>";
    $html .= "<span>" . $value['isn'] . "</span></div></div>";

    $html .= "<div class='search__card-durationbox'>";
    $html .= "<span>" . substr($value['ftitt'], 0, 2) . "</span>";
    $html .= "<span> h </span>";
    $html .= "<span>" . substr($value['ftitt'], 3, 2) . "</span>";
    $html .= "<span> min </span></div></div>";

    // switch card
    $html .= "
            <div class='search-results-train-card__switch-card'>
            <div class='search-results-train-card__switch-card-container'>
              <div class='search-results-train-card__switch-card-main'>
                <div class='search-results-train-card__switch-card-icontextbox'>
                  <div class='margin-r-xs'>
                    <svg class='search-results-train-card__switch-card-icon'>
                      <use xlink:href='../../../../utrance-railway/public/img/svg/sprite.svg#icon-swap'></use>
                    </svg>
                  </div>
                  <div>
                    <div class='search-results-train-card__switch-card-textbox'>
                      <span>switch at</span>
                    </div>";

    $html .= "<div>" . $value['isn'] . "</div></div></div>";

    $timeHr = substr($value['wait_time'], 0, 2);
    $timeMin = substr($value['wait_time'], 3, 2);
    if ($timeHr == '00') {
        $html .= "<div><div class='wait'> wait approx. $timeMin min </div></div></div>";
    } else {
        $html .= "<div><div class='wait'> wait approx. $timeHr h $timeMin min </div></div></div>";
    }

    $html .= "</div></div>";

    // other card

    $html .= "<div class='search-results-train-card__primary'>
                  <div class='search-results-train-card__detailbox'>
                  <div class='search-results-train-card__train-time'>";

    $timeDecide = timeDecider(substr($value['tsidt'], 0, 2));

    $html .= "<span>  $timeDecide[0] </span>";
    $html .= "<span> : </span>";
    $html .= "<span>" . substr($value['tsidt'], 3, 2) . "</span>";
    $html .= "<span>  $timeDecide[1] </span>";
    $html .= "<span> - </span>";

    $timeDecide = timeDecider(substr($value['tseat'], 0, 2));

    $html .= "<span> $timeDecide[0] </span>";
    $html .= "<span> : </span>";
    $html .= "<span>" . substr($value['tseat'], 3, 2) . "</span>";
    $html .= "<span> $timeDecide[1] </span></div>";
    $train_id=$value['trti'];
    $html .= "<div class='search-results-train-card__train-name'>";
    $html .= "<a href='/utrance-railway/view-train?train_id=$train_id'>" . $value['trtn'] . "</a></div>";
    $html .= "<div class='search__card-detailbox--train-journey'>";
    $html .= "<span>" . $value['isn'] . "</span>";
    $html .= "<span> to </span>";
    $html .= "<span>" . $value['tsen'] . "</span></div></div>";

    $html .= "<div class='search__card-durationbox'>";
    $html .= "<span>" . substr($value['iterr'], 0, 2) . "</span>";
    $html .= "<span> h </span>";
    $html .= "<span>" . substr($value['iterr'], 3, 2) . "</span>";
    $html .= "<span> min </span></div>";

    $html .= "</div>";

    // other card

    $html .= "</div>";

    $html .= "<div class='search-results-train-card__sub '>";

    $html .= "<div class='search-results-train-card__classbox'>";

    $option = "op" . $option;
    $_SESSION[$option] = $value;

    if($isEligible && $isPriceAvailable) {
      $html .= "<a href='/utrance-railway/book-seats?op=$option&mode=intersect' class='btn-square-no-bg'><p>Proceed</p></a>";
    } else if(!$isPriceAvailable) {
      $html .= "<div class='btn-square-no-bg--disabled'><p>Ticket Prices Not Available</p></div>";
    } else {
      $html .= "<div class='btn-square-no-bg--disabled'><p>Not Available</p></div>";
    }

    $html .= "</div></div></div>";

    return $html;
}

function timeDecider($time)
{
    $dayTime = 'am';
    if ($time > 12) {
        $time = $time - 12;
        $time = '0' . $time;
        $dayTime = 'pm';
    }
    return [$time, $dayTime];
}
