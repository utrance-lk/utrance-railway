<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

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
                <div class="titles margin-t-m margin-b-s">
                    <div class="titles__id">
                        Path id
                    </div>
                    <div class="titles__station">
                        Station
                    </div>
                    <div class="titles__arr-time">
                        Arr. Time
                    </div>
                    <div class="titles__dept-time">
                        Dept. Time
                    </div>
                </div>
                <div class="schedule">
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
                </div>
                <div class="btn-update-route">
                    <button class="btn-round-blue margin-t-m">
                        Update Route
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/viewRoute.js"></script>
<script>addStops();</script>