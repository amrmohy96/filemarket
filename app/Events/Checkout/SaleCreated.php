<?php

namespace App\Events\Checkout;

use App\Models\Sale\Sale;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaleCreated
{
    use Dispatchable, SerializesModels;

    public $sale;
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }
}
