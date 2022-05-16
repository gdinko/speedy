<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesLocationService
{
    /**
     * getCountry
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getCountry($id, Request $request): array
    {
        return $this->post(
            "location/country/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findCountry
     *
     * @param  mixed $request
     * @return array
     */
    public function findCountry(Request $request): array
    {
        return $this->post(
            'location/country',
            $request->hydrate(),
        );
    }

    /**
     * getAllCountries
     *
     * @param  mixed $request
     * @return array
     */
    public function getAllCountries(Request $request): array
    {
        return $this->post(
            'location/country/csv',
            $request->hydrate(),
        );
    }

    /**
     * getState
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getState($id, Request $request): array
    {
        return $this->post(
            "location/state/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findState
     *
     * @param  mixed $request
     * @return array
     */
    public function findState(Request $request): array
    {
        return $this->post(
            'location/state',
            $request->hydrate(),
        );
    }

    /**
     * getAllStates
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllStates($countryId, Request $request): array
    {
        return $this->post(
            "location/state/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * getSite
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getSite($id, Request $request): array
    {
        return $this->post(
            "location/site/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findSite
     *
     * @param  mixed $request
     * @return array
     */
    public function findSite(Request $request): array
    {
        return $this->post(
            'location/site',
            $request->hydrate(),
        );
    }

    /**
     * getAllSites
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllSites($countryId, Request $request): array
    {
        return $this->post(
            "location/site/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * getStreet
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getStreet($id, Request $request): array
    {
        return $this->post(
            "location/street/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findStreet
     *
     * @param  mixed $request
     * @return array
     */
    public function findStreet(Request $request): array
    {
        return $this->post(
            'location/street',
            $request->hydrate(),
        );
    }

    /**
     * getAllStreets
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllStreets($countryId, Request $request): array
    {
        return $this->post(
            "location/street/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * getComplex
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getComplex($id, Request $request): array
    {
        return $this->post(
            "location/complex/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findComplex
     *
     * @param  mixed $request
     * @return array
     */
    public function findComplex(Request $request): array
    {
        return $this->post(
            'location/complex',
            $request->hydrate(),
        );
    }

    /**
     * getAllComplexes
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllComplexes($countryId, Request $request): array
    {
        return $this->post(
            "location/complex/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * findBlock
     *
     * @param  mixed $request
     * @return array
     */
    public function findBlock(Request $request): array
    {
        return $this->post(
            'location/block',
            $request->hydrate(),
        );
    }

    /**
     * getPoi
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getPoi($id, Request $request): array
    {
        return $this->post(
            "location/poi/{$id}",
            $request->hydrate(),
        );
    }

    /**
     * findPoi
     *
     * @param  mixed $request
     * @return array
     */
    public function findPoi(Request $request): array
    {
        return $this->post(
            'location/poi',
            $request->hydrate(),
        );
    }

    /**
     * getAllPoi
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllPoi($countryId, Request $request): array
    {
        return $this->post(
            "location/poi/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * getAllPostcodes
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllPostcodes($countryId, Request $request): array
    {
        return $this->post(
            "location/postcode/csv/{$countryId}",
            $request->hydrate(),
        );
    }

    /**
     * getOffice
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getOffice($id, Request $request): array
    {
        return $this->post(
            'location/office/{$id}',
            $request->hydrate(),
        );
    }

    /**
     * findOffice
     *
     * @param  mixed $request
     * @return array
     */
    public function findOffice(Request $request): array
    {
        return $this->post(
            'location/office',
            $request->hydrate(),
        );
    }
}
