<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesTrackAndTraceService
{
    /**
     * track
     *
     * @param  mixed $request
     * @return array
     */
    public function track(Request $request): array
    {
        return $this->post(
            'track',
            $request->hydrate(),
        );
    }

    /**
     * bulkTrackingDataFiles
     *
     * @param  mixed $request
     * @return array
     */
    public function bulkTrackingDataFiles(Request $request): array
    {
        return $this->post(
            'track/bulk',
            $request->hydrate(),
        );
    }
}
