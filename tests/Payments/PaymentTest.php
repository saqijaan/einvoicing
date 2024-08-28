<?php

namespace Tests\Payments;

use Einvoicing\Payments\Payment;
use Einvoicing\Payments\Transfer;
use PHPUnit\Framework\TestCase;

final class PaymentTest extends TestCase
{
    /** @var Payment */
    private $payment;

    /** @var Transfer */
    private $transfer;

    protected function setUp(): void
    {
        $this->payment = new Payment();
        $this->transfer = new Transfer();
    }

    public function testCanRemoveTransfers(): void
    {
        $this->payment
            ->addTransfer($this->transfer)
            ->removeTransfer()
            ->addTransfer($this->transfer);

        $this->assertSame($this->transfer, $this->payment->getTransfer());
    }
}
