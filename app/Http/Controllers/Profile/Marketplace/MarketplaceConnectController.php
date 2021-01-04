<?php

namespace App\Http\Controllers\Profile\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Str;

class MarketplaceConnectController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','isConnected']);
    }

    public function index()
    {
        session(['stripe_token' => Str::random(60)]);
        return view('profile.marketplace.index');
    }

    public function store(Request $request,Guzzle $guzzle)
    {
        if (!$request->code){
            return redirect()->route('profile.connect');
        }

        if ($request->state !=  session('stripe_token')){
            return redirect()->route('profile.connect');
        }

        $stripeRequest = $guzzle->request('POST', 'https://connect.stripe.com/oauth/token', [
            'form_params' => [
                'client_secret' => config('services.stripe.secret'),
                'code' => $request->code,
                'grant_type' => 'authorization_code'
            ]
        ]);

        $stripeResponse = json_decode($stripeRequest->getBody());

        $request->user()->update([
            'stripe_id' => $stripeResponse->stripe_user_id,
            'stripe_key' => $stripeResponse->stripe_publishable_key,
        ]);

        return redirect()->route('profile')
            ->withSuccess('You have connected your Stripe account.');

    }
}
