<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking as BookingModel;

class Booking extends BaseController
{
    public function index()
    {
        $username = session()->get('username');

        $booking = new bookingModel();

        $data =  $booking->getUserBooking($username);

        return view('myBooking', ['userBooking' => $data]);
    }
}
