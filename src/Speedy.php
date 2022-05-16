<?php

namespace Gdinko\Speedy;

class Speedy
{
    use MakesHttpRequests;
    use Actions\ManagesShipmentService,
        Actions\ManagesPrintService,
        Actions\ManagesTrackAndTraceService,
        Actions\ManagesPickupService,
        Actions\ManagesLocationService,
        Actions\ManagesCalculationService,
        Actions\ManagesClientService,
        Actions\ManagesValidationService,
        Actions\ManagesServicesService,
        Actions\ManagesPaymentsService;

    /**
     * Speedy API username
     */
    protected $user;

    /**
     * Speedy API password
     */
    protected $pass;

    /**
     * Speedy API Base Url
     */
    protected $baseUrl;

    /**
     * Speedy API Request timeout
     */
    protected $timeout;

    public function __construct()
    {
        $this->user = config('speedy.user');

        $this->pass = config('speedy.pass');

        $this->timeout = config('speedy.timeout');

        $this->configBaseUrl();
    }

    public function configBaseUrl()
    {
        $this->baseUrl = config('speedy.base-url');
    }

    public function setAccount($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function getAccount()
    {
        return [
            'user' => $this->user,
            'pass' => $this->pass,
        ];
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }
}
