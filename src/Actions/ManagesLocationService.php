<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;
use Gdinko\Speedy\Resources\CsvResource;

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
     * @return object
     */
    public function getAllCountries(Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            'location/country/csv',
            $hydrator->hydrate(),
            true
        ));
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
     * @return object
     */
    public function getAllStates($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/state/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
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
     * @return object
     */
    public function getAllSites($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/site/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
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
     * @return object
     */
    public function getAllStreets($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/street/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
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
     * @return object
     */
    public function getAllComplexes($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/complex/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
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
     * @return object
     */
    public function getAllPoi($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/poi/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
    }

    /**
     * getAllPostcodes
     *
     * @param  mixed $countryId
     * @param  mixed $request
     * @return object
     */
    public function getAllPostcodes($countryId, Hydrator $hydrator): object
    {
        return new CsvResource($this->post(
            "location/postcode/csv/{$countryId}",
            $hydrator->hydrate(),
            true
        ));
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
            "location/office/{$id}",
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
