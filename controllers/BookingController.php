<?php

include_once "../classes/core/Controller.php";
include_once "../models/BookingModel.php";
include_once "../middlewares/AuthMiddleware.php";

class BookingController extends Controller {

    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getAllBookings($request) {
       if(!$this->authMiddleware->isLoggedIn()) {
           return 'You are not logged in!!';
       }
       if($request->isGet()) {
           // return database results
           return $this->render('myBookings');
       }
    }

    public function getBooking($request) {
        if(!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if($request->isGet()) {
            // return selected booking
            return $this->render('myBookings');
        }

    }

    public function createBooking($request) {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($request->isGet()) {
            // return selected booking
            return $this->render('booking');
        }

    }

    public function bookedTour($request) {
        if($request->isGet()) {
            return $this->render('bookedTour');
        }
    }

    public function updateBooking() {
        // update
    }

    public function deleteBooking() {
        // delete
    }

    // admin
    public function bookingForTrain($request) {
        if($this->authMiddleware->restrictTo('admin')) {
            if($request->isGet()) {
                return $this->render('bookingForATrain');
            }
        } else {
            return 'You are not authorized';
        }

    }

    public function manageFreights($request) {
        if($this->authMiddleware->restrictTo('admin')) {
            if($request->isGet()) {
                return $this->render(['admin', 'manageFreights']);
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function manageBookings($request) {
        if ($this->authMiddleware->restrictTo('admin')) {
            if($request->isGet()) {
                return $this->render(['admin', 'manageBookings']);
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function freightBookingForTrain($request) {
        if ($this->authMiddleware->restrictTo('admin')) {
            if($request->isGet()) {
                return $this->render('freightBookingForATrain');
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function searchFreightTrains($request) {
        if($request->isGet()) {
            return $this->render('freightSearch');
        }
    }

    public function bookFreight($request) {
        if($request->isGet()) {
            return $this->render('bookFreight');
        }
    }


}
