<?php

function renderNewsCard() {
    return "<div class='newscard-small'>
                <div class='newscard-small__img-box'>
                    <img src='/utrance-railway/public/img/pages/newsFeed/train1.jpg' class='newscard-small__img' alt='news-img'>
                    <div class='newscard-small__view-btn'>
                    <a href='/utrance-railway/news/news01'>
                        <span>View</span>
                    </a>
                        <svg class='newscard-small__icon'>
                            <use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-chevron-right'></use>
                        </svg>
                    </div>
                </div>
                <div class='newscard-small__content'>
                The train from Colombo to Kandy will  not depart from Colombo today due to Corona lockdown process in the western province. The ministry of health and the ministry of railway have decided to implement this weekend.
                </div>
            </div>
        ";
}

?>