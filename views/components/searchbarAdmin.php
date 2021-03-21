<?php

// first argument = what you are searching for
// from second argument on = what categories you can search
function renderAdminSearch($args, $action) {
    return "
            <form class='searchbar-admin' method='POST' action='$action' >
                <input type='text' class='searchbar-admin__search' placeholder='Search $args[0] by $args[1] or $args[2]' name='searchTrain'/>
                <button>
                <svg class='searchbar-admin__icon'>
                  <use xlink:href='/public/img/svg/sprite.svg#icon-magnifying-glass'></use>
                </svg>
                </button>
            </form>
    ";
}

?>