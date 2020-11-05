<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";

class ViewController extends Controller
{

    public function home($request)
    {

        if ($request->isPost()) {
            // $searchTourModel = new ViewModel();
            // $searchTourModel->loadData($request->getBody());

            // $pathArrays = $searchTourModel->getTours();

            // return $this->render('searchResults', $pathArrays);
        }

        return $this->render('home');
    }

    public function search($request)
    {

        // var_dump($request->getBody());

        if ($request->isPost()) {

            // var_dump($request->getBody());

            $searchTourModel = new ViewModel();
            $searchTourModel->loadData($request->getBody());

            $pathArrays = $searchTourModel->getTours();

            // foreach ($pathArrays as $key => $value) {
            //     $$key = $value;
            //     var_dump($$key);
            //     // var_dump($array(0));
            // }

            // var_dump($searchTourModel['resultsArr']);
            // print_r($pathArrays['directPaths']);
            // return 'success';
            return $this->render('searchResults', $pathArrays);

        }

        // var_dump($request->getBody());
       

        return $this->render('searchResults');

    }

    public function contact()
    {
        App::$APP->router->renderView('contact');
    }

    public function handleContact($request)
    {
        $body = $request->getBody();
        var_dump($body);
        return 'Handling submitted data';
    }

    public function cat()
    {
        echo 'hello from cat!!';
    }

    
}
