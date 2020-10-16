<?php

include_once "../classes/core/Controller.php";

class AjaxController extends Controller {

    public function hi() {
       var_dump(App::$APP->request->getBody());
    //    echo "working here";
    }

}