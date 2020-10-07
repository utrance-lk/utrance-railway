<?php 

include_once "App.php";

class Model {

    // did not implemented generalized methods as it may lead to more complexity

    // But, since we imported the "App.php" file here we have to include this Model file in our defined models such as UserModel.php

    // We import this file because our data object is in the App.php file

    public function loadData($data) {
    
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value; // asigning the values for properties of the UserModel class
            }
        }
    }


}