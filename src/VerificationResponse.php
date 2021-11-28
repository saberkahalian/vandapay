<?php

namespace Saber\Vandapay;

class VerificationResponse
{
    /** @var int */
    private $code;

    /** @var string|null */
    private $cardHash;

    /** @var string|null */
    private $cardPan;

    /** @var int|null */
    private $referenceId;

    /** @var string|null */
    private $feeType;

    /** @var int|null */
    private $fee;

    public function __construct(array $result)
    {
        $this->code = $result['result'] ?? $result['result'];

        if ($this->success()) {
            $this->cardHash = $result['data']['card_hash'];
            $this->cardPan = $result['data']['card_pan'];
            $this->referenceId = $result['data']['ref_id'];
            $this->feeType = $result['data']['fee_type'];
            $this->fee = $result['data']['fee'];
        }

    }

    public function success(): bool
    {
        return $this->code === 1;
    }

    public function cardHash(): string
    {
        return $this->cardHash;
    }

    public function cardPan(): string
    {
        return $this->cardPan;
    }

    public function referenceId(): int
    {
        return $this->referenceId;
    }

    public function feeType(): string
    {
        return $this->feeType;
    }

    public function fee(): int
    {
        return $this->fee;
    }

    public function code(): int
    {
        return $this->code;
    }

    public function error(): Error
    {
        return new Error($this->code);
    }

}
