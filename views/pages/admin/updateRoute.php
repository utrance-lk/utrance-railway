    <div class="load-content-container">
        <div class="load-content">
            <div class="load-content--stations">
                <?php
                    if (isset($users)) {
                        foreach ($users as $key => $value) {
                            $html = "";
                            $html .= "<div class='content-title'>";
                            //$html .="<p >".$value['first_name']." 's Account Settings</p></div>";
                            if (isset($updateSetValue['first_name'])) {
                                $html .= "<p >" . $updateSetValue['first_name'] . " 's Account Settings</p></div>";

                            } else {
                                $html .= "<p >" . $value['first_name'] . " 's Account Settings</p></div>";
                            }

                            $dom = new DOMDocument();
                            $dom->loadHTML($html);
                            print_r($dom->saveHTML());
                        }
                    }
                ?>
                <div class="content-title">
                    <p>Matara - Colombo Route</p>
                    <p>#1</p>
                </div>
                <div class="schedule margin-t-m">
                    <div class="stop-card back-odd">
                        <div class="stop-card__details">
                            <div class="stop-card__path-id">
                                #1
                            </div>
                            <div class="stop-card__station">
                                Matara
                            </div>
                            <div class="stop-card__arr-time">
                                08:00 AM
                            </div>
                            <div class="stop-card__dept-time">
                                09:00 AM
                            </div>
                        </div>
                        <div class="stop-card__add-btn">
                            <svg class="add-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
                            </svg>
                        </div>
                    </div>
                    <div class="stop-card back-even">
                        <div class="stop-card__details">
                            <div class="stop-card__path-id">
                                #2
                            </div>
                            <div class="stop-card__station">
                                Weligama
                            </div>
                            <div class="stop-card__arr-time">
                                10:00 AM
                            </div>
                            <div class="stop-card__dept-time">
                                11:00 AM
                            </div>
                        </div>
                        <div class="stop-card__add-btn">
                            <svg class="add-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
                            </svg>
                        </div>
                    </div>
                    <div class="add-stop-popup margin-t-s margin-b-s">
                        <form action="#" class="add-stop-popup__form">
                            <div class="add-stop-popup__station">
                                <input type="text" class="">
                            </div>
                            <div class="add-stop-popup__arr-time">
                                <input type="time" class="">
                            </div>
                            <div class="add-stop-popup__dept-time">
                                <input type="time" class="">
                            </div>
                            <button class="btn-square-small">
                                Add Station
                            </button>
                        </form>
                        <div class="add-stop-popup__stop-btn">
                            <svg class="close-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-clear'></use>
                            </svg>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>