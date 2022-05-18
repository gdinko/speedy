<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesTrackAndTraceService
{
    /**
     * track
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function track(Hydrator $hydrator): array
    {
        return $this->post(
            'track',
            $hydrator->hydrate(),
        );
    }

    /**
     * bulkTrackingDataFiles
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function bulkTrackingDataFiles(Hydrator $hydrator): array
    {
        return $this->post(
            'track/bulk',
            $hydrator->hydrate(),
        );
    }
}
