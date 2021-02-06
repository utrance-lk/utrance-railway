<?php

// use <div class="filters__container margin-t-s"></div> as the container and inside the container call the function per each filter
// pass options as an array
function renderFilterItem($name, $options)
{
    $id = implode("__", explode(" ", strtolower($name)));

    $markup = "
            <div class='filter'>
                <label for='$id' class='margin-r-s'>$name&nbsp;&colon;</label>
                <select name='$id'  id='$id' class='form__input'>
    ";

    foreach ($options as $option) {
        $value = strtolower($option);
        if($value === 'all') {
            $value .= '-';
            $value .= $id;
        }
        $markup .= "<option value='$value'>$option</option>";
    }

   return $markup .= "
                </select>
            </div>
    ";
}
