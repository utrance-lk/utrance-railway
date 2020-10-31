<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";



class AuthController extends Controller
{

    public function registerPageNow($request)
    {
        $registerModel=new UserModel();

       if($request->isPost()){
         
           $registerModel->loadData($request->getBody());
          
           
          

    if( $registerModel->register()){
               return "Success";
    }else{
        
        
            switch($registerModel->valid()){
                case 0: return "First Name is Required";
                case 1: return "Last Name is required";
                case 2: return "Street line 1 required";
                case 3: return "street line 2 required";
                case 4: return "City Required";
                case 5: return "Contact Num";
                
            }

        
       
        
    }
           
     /*echo '<pre>';
    var_dump($registerModel->errors);
    echo '</pre>';
    exit; */
 
       /*return $this->render('register',[
           'model'=>$registerModel
       ]);*/
       
    }
}

    public function registerPage(){
        return $this->render('register');
        
    }


    public function getMy($request) {
        if($request->isPost()) {
            //from
            return 'success';
        }
        return $this->render('admin');
 
    }
    
   public function signIn(){
    return $this->render('signIn');
}
   }

   

    /*public function isLoggedIn()
    {
        
        // checks whether user is logged in or not
    }

    public function forgotPassword()
    {
        // user forget the password
    }

    public function resetPassword()
    {
        // reset password
    }

    public function updatePassword()
    {
        // updates the password
    }

    public function restricTo()
    {
        // grant permission
    }

    public function protect()
    {
        // protect the route
    }*/


