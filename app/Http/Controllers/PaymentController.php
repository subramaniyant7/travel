<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    private $razorpayId = "rzp_test_ClxBP33XajrL8B";
    private $razorpayKey = "ZX3jVItOpO1DHSVL9l68clP5";

    public function Initiate(Request $request)
    {
        // Generate random receipt id
        $receiptId = Str::random(20);

        // Create an object of razorpay
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(array(
            'receipt' => $request->input('load_flight_id'),
            'amount' => $request->input('load_price') * 100,
            'currency' => 'INR'
            )
        );

        $totalQty = $request->input('load_flight_adult_qty') + $request->input('load_flight_kids_qty') + $request->input('load_flight_infants_qty');
        // Return response on payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->input('load_price') * 100,
            'currency' => 'INR',
            'email' => $request->input('load_user_email'),
            'uid'=> $request->input('load_user_id'),
            'flightId' => $request->input('load_flight_id'),
            'total' => $request->input('load_price'),
            'totalQty'=> $totalQty,
            'adultQty'=> $request->input('load_flight_adult_qty'),
            'kidsQty'=> $request->input('load_flight_kids_qty'),
            'infantQty'=> $request->input('load_flight_infants_qty'),
        ];

        // Let's checkout payment page is it working
        return view('payment-page',compact('response'));
    }

    public function Complete(Request $request)
    {
        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );

        // If Signature status is true We will save the payment response in our database
        // In this tutorial we send the response to Success page if payment successfully made
        if($signatureStatus == true)
        {
            // You can create this page
            $bookingData =  ['user_id'=>$request->input('uid'),'flight_id'=>$request->input('flightId')];
            $createOrder = insertData('booking',$bookingData);
            $bookingDetails = ['booking_id'=>$createOrder,'cost'=>$request->input('total'),
                                'no_of_persons'=>$request->input('totalQty'),'adult'=>$request->input('adultQty'),
                                'kids'=>$request->input('kidsQty'),'infant'=>$request->input('infantQty'),
                                'rzp_signature'=>$request->input('rzp_signature'),'rzp_paymentid'=>$request->input('rzp_paymentid'),
                                'rzp_orderid'=>$request->input('rzp_orderid')
                            ];
            $createOrderDetails = insertData('booking_details',$bookingDetails);
            return view('payment-success-page',['response'=>$request->all()]);
        }
        else{
            // You can create this page
            return view('payment-failed-page');
        }
    }

    // In this function we return boolean if signature is correct
    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
        try
        {
            // Create an object of razorpay class
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }
    }
}
