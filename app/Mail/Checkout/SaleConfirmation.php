<?php

namespace App\Mail\Checkout;

use App\Models\Sale\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SaleConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }


    public function build(): SaleConfirmation
    {
        return $this->subject('your purchase is confirmed')
            ->view('mails.checkout.confirmation');
    }
}
