<?php

namespace Saber\VandaPay;

class VandaPay
{
    /** @var string */
    private $pin_api;

    /** @var int */
    private $amount;

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

    public function request(): Request
    {
        $pin_api = $this->pin_api ?: config('vandapay.pin_api');
        return new Request($pin_api, $this->amount);
    }

    public function verification(): Verification
    {
        $pin_api = $this->pin_api ?: config('vandapay.pin_api');
        return new Verification($pin_api, $this->amount);
    }
}
