<?php

namespace App\Jobs\Checkout;

use App\Events\Checkout\SaleCreated;
use App\Models\File\File;
use App\Models\Sale\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class createSale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $file;

    public function __construct(File $file, $email)
    {
        $this->file = $file;
        $this->email = $email;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sale = new Sale;
        $sale->fill([
            'identifier' => uniqid(true),
            'buyer_email' => $this->email,
            'sales_price' => $this->file->price,
            'sales_commission' =>$this->file->calcCommission()
        ]);

        $sale->file()->associate($this->file);
        $sale->user()->associate($this->file->user);
        $sale->save();

        // fire event
        event(new SaleCreated($sale));
    }
}
