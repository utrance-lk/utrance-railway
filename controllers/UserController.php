<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "../middlewares/AuthMiddleware.php";

class UserController extends Controller
{
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getMe($request, $response) {
        
        if($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {
                return $this->render('settings');
            }
        } else {
            return 'You are not logged in!';
        }
    }

    public function upload($request, $response){
        if($request->isPost()){
            
            $updateUserDetailsModel = new UserModel();
            $tempUpdateUserBody = $request->getBody();
            $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
            $tempUpdateUserBody['file']=$_FILES;
            $updateUserDetailsModel->loadData($tempUpdateUserBody);
            $array=$updateUserDetailsModel->uploadImage(App::$APP->activeUser()['id']);
            if($array === "Success"){
                return $response->redirect('/utrance-railway/settings');
            }else{
                var_dump($array);
            }
            
            
        }
        return $this->render('settings');



            
         }
        
           
        
        
    

   

    public function updateMe($request, $response) {
       
        $updateUserDetailsModel = new UserModel();
        
        if ($request->isPost()) {
              
            $tempUpdateUserBody = $request->getBody();

            $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
            $tempUpdateUserBody['user_role']=App::$APP->activeUser()['role'];
            $tempUpdateUserBody['user_profile_image']=App::$APP->activeUser()['user_image'];
            
            $updateUserDetailsModel->loadData($tempUpdateUserBody);
           
            $state = $updateUserDetailsModel->updateMyProfile();
           
            if ($state === 'success') { 
                
                return $response->redirect('/utrance-railway/settings');
            } else {
                $updateUserDetailsSetValue = $updateUserDetailsModel->registerSetValue($state); //Ashika
               return $this->render('settings', $updateUserDetailsSetValue);
            }
        }
    
        
    }

    public function deleteMe()
    {
        // delete my profile
    }

    public function createUser()
    {
        // do not implement this method
        // use sign up in AuthController
    }

    public function aboutUs()
    {

        return $this->render('aboutUs');

    }


    public function newsFeed(){
       
        return $this->render('newsFeed');
    }

    public function newsFeed01(){
       
        return $this->render(['newsFeed','newsFeed01']);
    }

    public function newsFeed02(){
       
        return $this->render(['newsFeed','newsFeed02']);
    }

    public function newsFeed03(){
       
        return $this->render(['newsFeed','newsFeed03']);
    }


    public function newsFeed04(){
       
        return $this->render(['newsFeed','newsFeed04']);
    }

    public function newsFeed05(){
       
        return $this->render(['newsFeed','newsFeed05']);
    }

    public function newsFeed06(){
       
        return $this->render(['newsFeed','newsFeed06']);
    }

    public function newsFeed07(){
       
        return $this->render(['newsFeed','newsFeed07']);
    }

    public function newsFeed08(){
       
        return $this->render(['newsFeed','newsFeed08']);
    }

    public function newsFeed09(){
       
        return $this->render(['newsFeed','newsFeed09']);
    }

    public function newsFeed10(){
       
        return $this->render(['newsFeed','newsFeed10']);
    }

    

}
