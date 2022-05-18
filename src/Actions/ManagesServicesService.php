<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesServicesService
{
    /**
     * services
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function services(Hydrator $hydrator): array
    {
        return $this->post(
            'services',
            $hydrator->hydrate(),
        );
    }

    /**
     * destinationServices
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function destinationServices(Hydrator $hydrator): array
    {
        return $this->post(
            'services/destination',
            $hydrator->hydrate(),
        );
    }
}
