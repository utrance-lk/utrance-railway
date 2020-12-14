<?php

class AuthMiddleware {

    public function isLoggedIn() { 
        if (App::$APP->user) {
            return true;
        }
    
        return false;
    
    }

    public function restrictTo($roles) {

        if(is_array($roles)) {
            foreach($roles as $role) {
                if (App::$APP->activeUser()['role'] === $role) {
                    return true;
                }
            }
        } else {
            if (App::$APP->activeUser()['role'] === $roles) {
                return true;
            }
        }

        return false;
    }
}

