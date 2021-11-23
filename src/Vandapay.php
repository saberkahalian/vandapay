<?php

namespace Saber\Vandapay;

class Vandapay
{
    /** @var string */
    private $pin_api;

    /** @var int */
    private $amount;

    /** @var string */
    private $order_id;

    public function pin_api(string $pin_api): self
    {
        $this->pin_api = $pin_api;

        return $this;
    }

    public function amount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function order_id(string $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }
    public function request(): Request
    {
        $pin_api = $this->pin_api ?: config('vandapay.pin_api');
        return new Request($pin_api, $this->amount,$this->order_id);
    }

    public function verification(): Verification
    {
        $pin_api = $this->pin_api ?: config('vandapay.pin_api');
        return new Verification($pin_api, $this->amount);
    }
}
