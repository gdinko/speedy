<?php

namespace Gdinko\Speedy;

use Gdinko\Speedy\Exceptions\SpeedyException;
use Illuminate\Support\Str;

class Speedy
{
    use MakesHttpRequests;
    use Actions\ManagesShipmentService;
    use Actions\ManagesPrintService;
    use Actions\ManagesTrackAndTraceService;
    use Actions\ManagesPickupService;
    use Actions\ManagesLocationService;
    use Actions\ManagesCalculationService;
    use Actions\ManagesClientService;
    use Actions\ManagesValidationService;
    use Actions\ManagesServicesService;
    use Actions\ManagesPaymentsService;

    public const SIGNATURE = 'CARRIER_SPEEDY';

    /**
     * Speedy API username
     */
    protected $user;

    /**
     * Speedy API password
     */
    protected $pass;

    /**
     * Speedy API Account Store
     *
     * @var array
     */
    protected $accountStore = [];

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

    /**
     * configBaseUrl
     *
     * @return void
     */
    public function configBaseUrl()
    {
        $this->baseUrl = config('speedy.base-url');
    }

    /**
     * setAccount
     *
     * @param  string $user
     * @param  string $pass
     * @return void
     */
    public function setAccount(string $user, string $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * getAccount
     *
     * @return array
     */
    public function getAccount(): array
    {
        return [
            'user' => $this->user,
            'pass' => $this->pass,
        ];
    }

    /**
     * getUserName
     *
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user;
    }

    /**
     * getPassword
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->pass;
    }

    /**
     * getSignature
     *
     * @return string
     */
    public function getSignature(): string
    {
        return self::SIGNATURE;
    }

    /**
     * setBaseUrl
     *
     * @param  string $baseUrl
     * @return void
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    /**
     * getBaseUrl
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * setTimeout
     *
     * @param  int $timeout
     * @return void
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * getTimeout
     *
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * addAccountToStore
     *
     * @param  string $user
     * @param  string $pass
     * @return void
     */
    public function addAccountToStore(string $user, string $pass)
    {
        $this->accountStore[Str::slug($user)] = [
            'user' => $user,
            'pass' => $pass,
        ];
    }

    /**
     * getAccountFromStore
     *
     * @param  string $user
     * @return array
     */
    public function getAccountFromStore(string $user): array
    {
        $key = Str::slug($user);

        if (isset($this->accountStore[$key])) {
            return $this->accountStore[$key];
        }

        throw new SpeedyException('Missing Account in Account Store');
    }

    /**
     * setAccountFromStore
     *
     * @param  string $account
     * @return void
     */
    public function setAccountFromStore(string $account)
    {
        $accountFromStore = $this->getAccountFromStore($account);

        $this->setAccount(
            $accountFromStore['user'],
            $accountFromStore['pass']
        );
    }
}
