<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesClientService
{

    /**
     * getClient
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getClient($id, Request $request): array
    {
        return $this->post(
            "client/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * getContractClients
     *
     * @param  mixed $request
     * @return array
     */
    public function getContractClients(Request $request): array
    {
        return $this->post(
            'client/contract',
            $request->hydrate(),
        );
    }

    /**
     * createContact
     *
     * @param  mixed $request
     * @return array
     */
    public function createContact(Request $request): array
    {
        return $this->post(
            'client/contact',
            $request->hydrate(),
        );
    }

    /**
     * getContactByExternalId
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getContactByExternalId($id, Request $request): array
    {
        return $this->post(
            "client/contact/external/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * getOwnClientId
     *
     * @param  mixed $request
     * @return array
     */
    public function getOwnClientId(Request $request): array
    {
        return $this->post(
            'client',
            $request->hydrate(),
        );
    }
}
