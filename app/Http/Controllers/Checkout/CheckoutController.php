<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutFreeRequest;
use App\Jobs\Checkout\createSale;
use App\Models\File\File;
use Illuminate\Http\Request;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function free(File $file, CheckoutFreeRequest $request)
    {
//        if (!$file->isFree()) {
//            return back()->withError('File is not free.!');
//        }
        dispatch(new createSale($file, $request->email));
        return back()->withSuccess('We\'ve email you with the link of the download');
    }


    public function payment(Request $request,File $file)
    {
        try {
            $charge = Charge::create([
                'amount' => $file->price * 100,
                'currency' => 'gbp',
                'source' => $request->stripeToken,
                'application_fee' => $file->calcCommission() * 100
            ], [
                'stripe_account' => $file->user->stripe_id
            ]);
        } catch (Exception $e) {
            return back()->withError('Something went wrong while processing your payment.');
        }

        dispatch(new createSale($file, $request->stripeEmail));
        return back()->withSuccess('Payment done,We\'ve email you with the link of the download');
    }


}
