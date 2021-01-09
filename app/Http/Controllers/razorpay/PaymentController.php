<?php

namespace App\Http\Controllers\razorpay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use Redirect, Response;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('CheckLogin');
    }

    public function show_products()
    {
        return view('razorpay.payment');
    }
    public function checkout(Request $request)
    {
        $new_data = [];
        $data = explode(',', urldecode($request->data));
        /* print_r($data);
        die; */
        $new_data['amt'] = $data[0];
        $new_data['id'] = $data[1];
        $new_data['old_p'] = $data[2];
        $new_data['new_p'] = $data[3];
        $new_data['img'] = $data[4];
        $new_data['title'] = $data[5];
        return view('checkout', compact('new_data'));
    }
    public function pay_success(Request $Request)
    {
        $data = [
            'user_id' => '1',
            'payment_id' => $request->payment_id,
            'amount' => $request->amount,
        ];
        $getId = Payment::insertGetId($data);
        $arr = array('msg' => 'Payment successful.', 'status' => true);
        return Response()->json($arr);
    }
    public function thank_you()
    {
        return view('razorpay.thankyou');
    }
}