<?php

namespace Gdinko\Speedy\Events;

use Gdinko\Speedy\Models\CarrierSpeedyPayment;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CarrierSpeedyPaymentEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $payment;

    public $account;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CarrierSpeedyPayment $payment, string $account)
    {
        $this->payment = $payment;

        $this->account = $account;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
