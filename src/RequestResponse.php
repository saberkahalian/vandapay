<?php

namespace Saber\Vandapay;

use Illuminate\Http\RedirectResponse;

class RequestResponse
{
    /** @var int */
    private $code;

    /** @var string|null */
    private $authority;

    /** @var string|null */
    private $formSource;

    /** @var int|null */
    private $fee;

    public function __construct(array $result,$order_id)
    {
        $this->code = $result['result'] ?? $result['result'];

        if ($this->success()) {

/*        $store_invoice = config('vandapay.store_invoice');
        $invoice_model = config('vandapay.invoice_model');

        if ($store_invoice)
        {
           $data = ['order_id' => $order_id
                        ,'au'  => $result['au']
                    ];
           $invoice = $invoice_model::firstOrCreate($data);
        }*/

            $this->authority     = $result['au'];
            $this->formSource    = $result['form'];
            
        }
    }

    public function success(): bool
    {
        return $this->code === 1;
    }


    public function payform()
    {
        return $this->formSource;
    }

    public function authority(): string
    {
        return $this->authority;
    }

    public function formSource(): string
    {
        return $this->formSource;
    }

    public function fee(): int
    {
        return $this->fee;
    }

    public function error(): Error
    {
        return new Error($this->code);
    }
}
