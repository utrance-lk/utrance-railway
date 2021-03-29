<?php

include_once "../classes/core/Controller.php";
include_once "../models/BookingModel.php";
include_once "../middlewares/AuthMiddleware.php";

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class BookingController extends Controller
{

    private $authMiddleware;

    public function __construct()
    {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getAllBookings($request)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!!';
        }
        if ($request->isGet()) {
            //var_dump("hy");
            $getAllBookingsModel = new BookingModel();
            $getAllBookingsModel->loadData($request->getBody());
            $getAllBookingArray = $getAllBookingsModel->getAllMyBookings();
            
            return $this->render('myBookings',$getAllBookingArray);
        }
    }

    public function getBooking($request)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($request->isGet()) {
            // return selected booking
            return $this->render('myBookings');
        }

    }

    public function createSeatBooking($request, $response)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($request->isGet()) {
            // return selected booking

            $option = $request->getQueryParams()['op'];
            $mode = $request->getQueryParams()['mode'];

            if(empty($_SESSION[$option])) {
                return $response->redirect('home');
            }

            $fullTrainDetails = App::$APP->session->get($option);

            App::$APP->session->remove($option);

            $train = $this->travellingTrains($mode, $fullTrainDetails);

            foreach ($train['trains'] as $key => $value) {
                $seatAvailability = new BookingModel();
                $seatAvailability->loadData(['train_id' => $value['train_id'], 'when' => $train['when']]);
                $availbleSeats = $seatAvailability->getAvailableSeatsCount();
                $train['trains'][$key]['sa_first_class'] = $availbleSeats[0]['sa_first_class'];
                $train['trains'][$key]['sa_second_class'] = $availbleSeats[0]['sa_second_class'];
            }

            App::$APP->session->set('booking', null);

            return $this->render('seatBooking', $train);
        }

        if ($request->isPost()) {

            $seatAvailability1 = new BookingModel();
            $seatAvailability1->loadData(['train_id' => $_POST['train1_id'], 'when' => $_POST['when']]);
            $availbleSeats1 = $seatAvailability1->getAvailableSeatsCount();
            $availbleSeats2 = null;

            if (isset($_POST['train2_id'])) {
                $seatAvailability2 = new BookingModel();
                $seatAvailability2->loadData(['train_id' => $_POST['train2_id'], 'when' => $_POST['when']]);
                $availbleSeats2 = $seatAvailability2->getAvailableSeatsCount();
            }

            if ($_POST['train_class1'] == 'firstClass') {
                if ($availbleSeats1[0]['sa_first_class'] < $_POST['person__count1']) {
                    return 'booking cannot be done';
                }
            }
            if ($_POST['train_class1'] == 'secondClass') {
                if ($availbleSeats1[0]['sa_second_class'] < $_POST['person__count1']) {
                    return 'booking cannot be done';
                }
            }
            if (isset($_POST['train_class2'])) {
                if ($_POST['train_class2'] == 'firstClass') {
                    if ($availbleSeats2[0]['sa_first_class'] < $_POST['person__count2']) {
                        return 'booking cannot be done';
                    }
                }
                if ($_POST['train_class2'] == 'secondClass') {
                    if ($availbleSeats2[0]['sa_second_class'] < $_POST['person__count2']) {
                        return 'booking cannot be done';
                    }
                }
            }

            $index = 1;
            foreach ($_SESSION['booking'] as $key => $value) {
                $_SESSION['booking'][$index]['passengers'] = $_POST['person__count' . $index];
                $_SESSION['booking'][$index]['class'] = $_POST['train_class' . $index];
                $_SESSION['booking'][$index]['base_price'] = $_POST['tickpricetrain' . $index];
                $_SESSION['booking'][$index]['total_amount'] = $_POST['amount'];
                $index++;
            }

            return $this->render('payment', $_POST);

        }

    }

    public function bookingSuccess($request, $response)
    {
        if ($request->isGet()) {


            if (empty($_SESSION['booking'])) {
                return $response->redirect('home');
            }


            $str = null;
            foreach ($_SESSION['booking'][1] as $key => $value) {
                $str .= $value;
            }

            if (isset($_SESSION['booking'][2])) {
                foreach ($_SESSION['booking'][2] as $key => $value) {
                    $str .= $value;
                }
            }

            $bookingVar = $_SESSION['booking'];

            $hashStr = md5($str);

            foreach ($bookingVar as $key => $value) {
                $storeBooking = new BookingModel();
                $storeBooking->loadData(['customer_id' => (int) $value['customer_id'], 'train_date' => $value['train_date'], 'train_id' => (int) $value['train_id'], 'from_station' => $value['from'], 'to_station' => $value['to'], 'passengers' => (int) $value['passengers'], 'class' => $value['class'], 'base_price' => (int) $value['base_price'], 'total_amount' => (int) $value['total_amount'], 'other_booking' => $hashStr]);
                $storeBooking->createBooking();
            }

            App::$APP->session->remove('booking');

            // QR generator
            $this->generateQR($hashStr);

            // send ticket
            $this->sendTicketWithQR($hashStr, $bookingVar);

            $response->redirect('home');

        }
    }

    private function generateQR($hashStr)
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create($hashStr)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);

        $result->saveToFile('C:/xampp/htdocs/utrance-railway/public/img/QR/' . $hashStr . '.png');
        
    }

    private function sendTicketWithQR($hashStr, $bookingVar)
    {
        App::$APP->email->sendTicket(App::$APP->activeUser()['email_id'], 'INVOICE', [
            'first_name' => App::$APP->activeUser()['first_name'],
            'hash' => $hashStr,
            'booking_details' => $bookingVar
        ]);

    }

    private function travellingTrains($mode, $fullTrainDetails)
    {
        if ($mode === 'direct') {
            $train1 = null;

            if (isset($fullTrainDetails['fssn'])) {
                $train1['from'] = $fullTrainDetails['fssn'];
            }

            if (isset($fullTrainDetails['tsen'])) {
                $train1['to'] = $fullTrainDetails['tsen'];
            }

            if (isset($fullTrainDetails['train_name'])) {
                $train1['train_name'] = $fullTrainDetails['train_name'];
            }

            if (isset($fullTrainDetails['train_id'])) {
                $train1['train_id'] = $fullTrainDetails['train_id'];
            }

            if (isset($fullTrainDetails['fssdt'])) {
                $train1['from_dept'] = $fullTrainDetails['fssdt'];
            }

            if (isset($fullTrainDetails['tseat'])) {
                $train1['to_arrt'] = $fullTrainDetails['tseat'];
            }

            if (isset($fullTrainDetails['total_time'])) {
                $train1['journey_time'] = $fullTrainDetails['total_time'];
            }

            if (isset($fullTrainDetails['train_type'])) {
                $train1['train_type'] = $fullTrainDetails['train_type'];
            }

            if (isset($fullTrainDetails['train1Price'])) {
                $train1['ticket_fc'] = $fullTrainDetails['train1Price']['first_class'];
                $train1['ticket_sc'] = $fullTrainDetails['train1Price']['second_class'];
                $train1['ticket_tc'] = $fullTrainDetails['train1Price']['third_class'];
            }

            $train1['train_no'] = 1;

            $trains['t1'] = $train1;

            $train['trains'] = $trains;
            $train['all_start'] = $fullTrainDetails['fssn'];
            $train['all_end'] = $fullTrainDetails['tsen'];
            $train['when'] = $fullTrainDetails['when'];

            return $train;

        }

        if ($mode === 'intersect') {
            $train1 = null;
            $train2 = null;

            // train 1

            if (isset($fullTrainDetails['fssn'])) {
                $train1['from'] = $fullTrainDetails['fssn'];
            }

            if (isset($fullTrainDetails['isn'])) {
                $train1['to'] = $fullTrainDetails['isn'];
            }

            if (isset($fullTrainDetails['frtn'])) {
                $train1['train_name'] = $fullTrainDetails['frtn'];
            }

            if (isset($fullTrainDetails['frti'])) {
                $train1['train_id'] = $fullTrainDetails['frti'];
            }

            if (isset($fullTrainDetails['fssdt'])) {
                $train1['from_dept'] = $fullTrainDetails['fssdt'];
            }

            if (isset($fullTrainDetails['fsiat'])) {
                $train1['to_arrt'] = $fullTrainDetails['fsiat'];
            }

            if (isset($fullTrainDetails['ftitt'])) {
                $train1['journey_time'] = $fullTrainDetails['ftitt'];
            }

            if (isset($fullTrainDetails['frtt'])) {
                $train1['train_type'] = $fullTrainDetails['frtt'];
            }

            if (isset($fullTrainDetails['train1Price'])) {
                $train1['ticket_fc'] = $fullTrainDetails['train1Price']['first_class'];
                $train1['ticket_sc'] = $fullTrainDetails['train1Price']['second_class'];
                $train1['ticket_tc'] = $fullTrainDetails['train1Price']['third_class'];
            }

            $train1['train_no'] = 1;

            // train 2

            if (isset($fullTrainDetails['isn'])) {
                $train2['from'] = $fullTrainDetails['isn'];
            }

            if (isset($fullTrainDetails['tsen'])) {
                $train2['to'] = $fullTrainDetails['tsen'];
            }

            if (isset($fullTrainDetails['trtn'])) {
                $train2['train_name'] = $fullTrainDetails['trtn'];
            }

            if (isset($fullTrainDetails['trti'])) {
                $train2['train_id'] = $fullTrainDetails['trti'];
            }

            if (isset($fullTrainDetails['tsidt'])) {
                $train2['from_dept'] = $fullTrainDetails['tsidt'];
            }

            if (isset($fullTrainDetails['tseat'])) {
                $train2['to_arrt'] = $fullTrainDetails['tseat'];
            }

            if (isset($fullTrainDetails['iterr'])) {
                $train2['journey_time'] = $fullTrainDetails['iterr'];
            }

            if (isset($fullTrainDetails['trtt'])) {
                $train2['train_type'] = $fullTrainDetails['trtt'];
            }

            if (isset($fullTrainDetails['train2Price'])) {
                $train2['ticket_fc'] = $fullTrainDetails['train2Price']['first_class'];
                $train2['ticket_sc'] = $fullTrainDetails['train2Price']['second_class'];
                $train2['ticket_tc'] = $fullTrainDetails['train2Price']['third_class'];
            }

            $train2['train_no'] = 2;

            $trains['t1'] = $train1;
            $trains['t2'] = $train2;

            $train['trains'] = $trains;
            $train['all_start'] = $fullTrainDetails['fssn'];
            $train['all_end'] = $fullTrainDetails['tsen'];
            $train['wait_time'] = $fullTrainDetails['wait_time'];
            $train['when'] = $fullTrainDetails['when'];

            return $train;
        }

        return false;
    }

    public function bookedTourIntersect($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {

                $bookedTourModel = new BookingModel();
                $tempBody = $request->getBody();
                $tempBody['id1'] = $request->getQueryParams()['id1'];
                $tempBody['id2'] = $request->getQueryParams()['id2'];
                
                $bookedTourModel->loadData($tempBody);
                $getBookedTourArray=$bookedTourModel->getBookedTourIntersect();
            //var_dump($getBookedTourArray);
                 return $this->render('bookedTour',$getBookedTourArray);
            }
        } else {
            return 'your not logged in!';
        }
    }

    public function bookedTourDirect($request){
        if ($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {

                $bookedTourModel = new BookingModel();
                $tempBody = $request->getBody();
                $tempBody['id1'] = $request->getQueryParams()['id1'];
                //var_dump($tempBody['id1']);
                $bookedTourModel->loadData($tempBody);
                $getBookedTourArray=$bookedTourModel->getBookedTourDirect();
                //var_dump($getBookedTourArray);
                 return $this->render('bookedTour',$getBookedTourArray);
            }
        } else {
            return 'your not logged in!';
        }
    }

    public function updateBooking()
    {
        // update
    }

    public function deleteBooking()
    {
        // delete
    }

    // admin
    public function bookingForTrain($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render('bookingForATrain');
            }
        } else {
            return 'You are not authorized';
        }

    }

    public function manageFreights($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render(['admin', 'manageFreights']);
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function manageBookings($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render(['admin', 'manageBookings']);
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function freightBookingForTrain($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render('freightBookingForATrain');
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function searchFreightTrains($request)
    {
        if ($request->isGet()) {
            return $this->render('freightSearch');
        }
    }

    public function bookFreight($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {
                return $this->render('bookFreight');
            }
        } else {
            return 'You are not logged in!';
        }
    }

    // checkout
    public function checkout($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {

            if ($request->isGet()) {
                return $this->render('checkout');
            }

        }
    }

}
