<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Auth;
use PayPal;
use App\User;
use App\Payment;
use Session;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function paymentSuccess(Request $request)
    {
        // \Log::debug('88888dasdf');
        // dd('dksjhfdskj');
        $data = $request->all();
        // \Log::debug($data);
        dd($data);
        $provider         = new ExpressCheckout;
        $checkout_details = $provider->getExpressCheckoutDetails($request->token);
        $response         = $provider->doExpressCheckoutPayment($data, $request->token, $request->PayerID);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $payment                         = new Payment;
            $payment->company_or_customer_id = $request->user_id;
            $payment->transferista_id        = $request->transferista_id;
            $payment->project_id             = $request->project_id;
            $payment->amount                 = $request->amount;
            $payment->payment_type           = "paypal";
            $payment->transaction_id         = $response['PAYMENTINFO_0_TRANSACTIONID'];
            $payment->save();
            return response()->json([
                'message' => 'payment Successful'
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
