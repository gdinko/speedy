<?php

namespace Gdinko\Speedy\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CarrierSpeedyTrackingEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $tracking;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $tracking)
    {
        $this->tracking = $tracking;
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
