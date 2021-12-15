<?php

namespace Saber\Vandapay;

use Illuminate\Support\Facades\Http;

class Verification
{

    /** @var int */
    private $amount;

    /** @var string */
    private $order_id;

    /** @var string */
    private $pin;

    /** @var array */
    private $bank_return;

    /** @var string */
    private $au;

    public function __construct( int $amount,array $bank_return,string $pin)
    {
        $this->amount       = $amount;
        $this->pin          = $pin;
        $this->bank_return = $bank_return;
    }
    

    public function send(): VerificationResponse
    {

        $url = config('vandapay.verification_url');
        

        $data = [            
            'pin'       => $this->pin,
            'price'     => $this->amount  ,
            'order_id'  => $this->order_id,
            'vprescode' => $this->au,
            'Bank_return'=>$this->bank_return,
        ];


        $response = Http::asJson()->acceptJson()->post($url, $data);
        
        $status =( $response->json()['result'] == 1 );

        $store_invoice = config('vandapay.store_invoice');
        $invoice_model = config('vandapay.invoice_model');

        if ($store_invoice)
        {
            $invoicedata = $data;
            unset($invoicedata['pin']);
            unset($invoicedata['Bank_return']);
            $invoicedata['status'] = $status ;
            $invoice = $invoice_model::firstOrCreate($invoicedata);
            $invoice['Bank_return'] = json_encode($data['Bank_return']);
            $invoice->save();
        }

        return new VerificationResponse($response->json());
    }

    public function au(string $au): self
    {
        $this->au = $au;

        return $this;
    }

    public function order_id(?string $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }

}
