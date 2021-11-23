<?php

namespace Saber\VandaPay;

use Illuminate\Support\Facades\Http;

class Request
{
    /** @var string */
    private $pin_api;

    /** @var int */
    private $order_id;

    /** @var int */
    private $amount;

    /** @var string */
    private $description;

    /** @var string */
    private $callbackUrl;

    /** @var string */
    private $mobile;

    /** @var string */
    private $email;

    public function __construct(string $pin_api, int $amount, string order_id)
    {
        $this->pin_api      = $pin_api;
        $this->amount       = $amount;
        $this->order_id     = $order_id;
    }

    public function send(): RequestResponse
    {
        $url = 'https://vandapardakht.com/Request';

        $data = json_encode(array(
            'pin'           => $this->pin_api,//your api
            'price'         =>$this->amount,
            'callback'      =>$this->callbackUrl ,//your callback with snverify.php
            'order_id'      => $this->order_id,
            "email"         => $this->email,//your customer's email optional
            "description"   => $this->description,// your  description  optional
            "name"          =>"Reza",//your customer's name  optional
            "mobile"        =>$this->mobile,//your customer's mobile  optional
            'ip'            => $_SERVER['REMOTE_ADDR'],
            'callback_type' =>2
        ));



        $response = Http::asJson()->acceptJson()->post($url, $data);

        return new RequestResponse($response->json());
    }

    public function description(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function callbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    public function mobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function email(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
