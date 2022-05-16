<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesLocationService
{
    /**
     * getCountry
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getCountry($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/country/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findCountry
     *
     * @param  mixed $request
     * @return array
     */
    public function findCountry(Hydrator $hydrator): array
    {
        return $this->post(
            'location/country',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllCountries
     *
     * @param  mixed $request
     * @return array
     */
    public function getAllCountries(Hydrator $hydrator): array
    {
        return $this->post(
            'location/country/csv',
            $hydrator->hydrate(),
        );
    }

    /**
     * getState
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getState($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/state/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findState
     *
     * @param  mixed $request
     * @return array
     */
    public function findState(Hydrator $hydrator): array
    {
        return $this->post(
            'location/state',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllStates
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllStates($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/state/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getSite
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getSite($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/site/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findSite
     *
     * @param  mixed $request
     * @return array
     */
    public function findSite(Hydrator $hydrator): array
    {
        return $this->post(
            'location/site',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllSites
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllSites($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/site/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getStreet
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getStreet($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/street/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findStreet
     *
     * @param  mixed $request
     * @return array
     */
    public function findStreet(Hydrator $hydrator): array
    {
        return $this->post(
            'location/street',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllStreets
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllStreets($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/street/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getComplex
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getComplex($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/complex/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findComplex
     *
     * @param  mixed $request
     * @return array
     */
    public function findComplex(Hydrator $hydrator): array
    {
        return $this->post(
            'location/complex',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllComplexes
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllComplexes($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/complex/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findBlock
     *
     * @param  mixed $request
     * @return array
     */
    public function findBlock(Hydrator $hydrator): array
    {
        return $this->post(
            'location/block',
            $hydrator->hydrate(),
        );
    }

    /**
     * getPoi
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getPoi($id, Hydrator $hydrator): array
    {
        return $this->post(
            "location/poi/{$id}",
            $hydrator->hydrate(),
        );
    }

    /**
     * findPoi
     *
     * @param  mixed $request
     * @return array
     */
    public function findPoi(Hydrator $hydrator): array
    {
        return $this->post(
            'location/poi',
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllPoi
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllPoi($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/poi/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getAllPostcodes
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return array
     */
    public function getAllPostcodes($countryId, Hydrator $hydrator): array
    {
        return $this->post(
            "location/postcode/csv/{$countryId}",
            $hydrator->hydrate(),
        );
    }

    /**
     * getOffice
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return array
     */
    public function getOffice($id, Hydrator $hydrator): array
    {
        return $this->post(
            'location/office/{$id}',
            $hydrator->hydrate(),
        );
    }

    /**
     * findOffice
     *
     * @param  mixed $request
     * @return array
     */
    public function findOffice(Hydrator $hydrator): array
    {
        return $this->post(
            'location/office',
            $hydrator->hydrate(),
        );
    }
}
