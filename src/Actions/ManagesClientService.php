<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesClientService
{
    /**
     * getClient
     *
     * @param  mixed $id
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function getClient($id, Hydrator $hydrator): array
    {
        return $this->post(
            "client/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getContractClients
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function getContractClients(Hydrator $hydrator): array
    {
        return $this->post(
            'client/contract',
            $hydrator->hydrate(),
        );
    }

    /**
     * createContact
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function createContact(Hydrator $hydrator): array
    {
        return $this->post(
            'client/contact',
            $hydrator->hydrate(),
        );
    }

    /**
     * getContactByExternalId
     *
     * @param  mixed $id
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function getContactByExternalId($id, Hydrator $hydrator): array
    {
        return $this->post(
            "client/contact/external/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getOwnClientId
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function getOwnClientId(Hydrator $hydrator): array
    {
        return $this->post(
            'client',
            $hydrator->hydrate(),
        );
    }
}
