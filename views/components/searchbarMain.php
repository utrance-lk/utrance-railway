<?php

function renderSearchBar($from, $to, $when)
{
    return "
                <form class='searchbar-main' method='POST' action='/utrance-railway/search'>
                    <div class='searchbar-main__search'>
                        <div class='searchbar-main__from-container'>
                            <div class='searchbar-main__from'>
                            <span>From</span>
                            <div class='searchbar-main__station--from-container'>
                                <div class='searchbar-main__station--from js--from__station' id='js--from__station'>$from</div>
                                <div class='searchbar-main__swap-btn js--swap-btn'>
                                <svg class='searchbar-main__icon'>
                                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite.svg#icon-swap'></use>
                                </svg>
                                </div>
                            </div>
                            </div>
                            <div class='searchbar-main__dropdown js--search-dropdown__from'>
                            <input type='text' id='dropdown-from' name='from' class='searchbar-main__dropdown-input js--search-dropdown__search-from'>
                            </div>
                            <ul class='searchbar-main__dropdown-search-results js--results__list-from'></ul>
                        </div>
                        <div class='searchbar-main__to-container'>
                        <div class='searchbar-main__to'>
                            <span>To</span>
                            <div class='searchbar-main__station--to js--to__station' id='js--to__station'>$to</div>
                        </div>
                        <div class='searchbar-main__dropdown js--search-dropdown__to'>
                            <input type='text' id='dropdown-to' name='to' class='searchbar-main__dropdown-input js--search-dropdown__search-to'>
                        </div>
                        <ul class='searchbar-main__dropdown-search-results js--results__list-to'></ul>
                        </div>
                        <div>
                        <div class='searchbar-main__when'>
                            <span>When</span>
                            <input type='date' class='searchbar-main__station--when js--when__date' name='when' value='$when' />
                        </div>
                        </div>
                    </div>
                    <input type='submit' value='Search' class='searchbar-main__search-btn js--searchbar__search-btn'>
                </form>
        ";
}
