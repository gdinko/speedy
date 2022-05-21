# Laravel Speedy API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gdinko/speedy.svg?style=flat-square)](https://packagist.org/packages/gdinko/speedy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/gdinko/speedy/run-tests?label=tests)](https://github.com/gdinko/speedy/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/gdinko/speedy/Check%20&%20fix%20styling?label=code%20style)](https://github.com/gdinko/speedy/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gdinko/speedy.svg?style=flat-square)](https://packagist.org/packages/gdinko/speedy)

[Speedy JSON API Documentation](https://services.speedy.bg/api/api_examples.html)

## Installation

You can install the package via composer:

```bash
composer require gdinko/speedy
```

If you plan to use database for storing nomenclatures:

```bash
php artisan migrate
```

If you need to export configuration file:

```bash
php artisan vendor:publish --provider="gdinko\speedy\SpeedyServiceProvider" --tag=config
```

## Configuration

```bash
SPEEDY_API_USER= #Get this from Speedy
SPEEDY_API_PASS= #Get this from Speedy
SPEEDY_API_BASE_URL= #default=https://api.speedy.bg/v1/
SPEEDY_API_TIMEOUT= #default=5
```

## Usage

Runtime Setup

```php
Speedy::setAccount('user', 'pass');
Speedy::setBaseUrl('endpoint');
Speedy::setTimeout(99);
```

Methods

```php

use Gdinko\Speedy\Facades\Speedy;

//Shipment Service
Speedy::createShipment(Hydrator $hydrator): array
Speedy::cancelShipment(Hydrator $hydrator): array
Speedy::addParcel(Hydrator $hydrator): array
Speedy::finalizePendingShipment(Hydrator $hydrator): array
Speedy::shipmentInformation(Hydrator $hydrator): array
Speedy::secondaryShipments($shipmentId, Hydrator $hydrator): array
Speedy::updateShipment(Hydrator $hydrator): array
Speedy::updateShipmentProperties(Hydrator $hydrator): array
Speedy::findParcelsByReference(Hydrator $hydrator): array
Speedy::handoverToCourier(Hydrator $hydrator): array

//Print Service
Speedy::print(Hydrator $hydrator): string
Speedy::extendedPrint(Hydrator $hydrator): array
Speedy::labelInfo(Hydrator $hydrator): array
Speedy::printVoucher(Hydrator $hydrator): string

//Track And Trace Service
Speedy::track(Hydrator $hydrator): array
Speedy::bulkTrackingDataFiles(Hydrator $hydrator): array

//Pickup Service
Speedy::pickup(Hydrator $hydrator): array
Speedy::pickupTerms(Hydrator $hydrator): array

//Location Service
Speedy::getCountry($id, Hydrator $hydrator): array
Speedy::findCountry(Hydrator $hydrator): array
Speedy::getAllCountries(Hydrator $hydrator): object
Speedy::getState($id, Hydrator $hydrator): array
Speedy::findState(Hydrator $hydrator): array
Speedy::getAllStates($countryId, Hydrator $hydrator): object
Speedy::getSite($id, Hydrator $hydrator): array
Speedy::findSite(Hydrator $hydrator): array
Speedy::getAllSites($countryId, Hydrator $hydrator): object
Speedy::getStreet($id, Hydrator $hydrator): array
Speedy::findStreet(Hydrator $hydrator): array
Speedy::getAllStreets($countryId, Hydrator $hydrator): object
Speedy::getComplex($id, Hydrator $hydrator): array
Speedy::findComplex(Hydrator $hydrator): array
Speedy::getAllComplexes($countryId, Hydrator $hydrator): object
Speedy::findBlock(Hydrator $hydrator): array
Speedy::getPoi($id, Hydrator $hydrator): array
Speedy::findPoi(Hydrator $hydrator): array
Speedy::getAllPoi($countryId, Hydrator $hydrator): object
Speedy::getAllPostcodes($countryId, Hydrator $hydrator): object
Speedy::getOffice($id, Hydrator $hydrator): array
Speedy::findOffice(Hydrator $hydrator): array

//Calculation Service
Speedy::calculate(Hydrator $hydrator): array

//Client Service
Speedy::getClient($id, Hydrator $hydrator): array
Speedy::getContractClients(Hydrator $hydrator): array
Speedy::createContact(Hydrator $hydrator): array
Speedy::getContactByExternalId($id, Hydrator $hydrator): array
Speedy::getOwnClientId(Hydrator $hydrator): array

//Validation Service
Speedy::validateAddress(Hydrator $hydrator): array
Speedy::validatePostcode(Hydrator $hydrator): array
Speedy::validatePhone(Hydrator $hydrator): array
Speedy::validateShipment(Hydrator $hydrator): array

//Services Service
Speedy::services(Hydrator $hydrator): array
Speedy::destinationServices(Hydrator $hydrator): array

//Payments Service
Speedy::payments(Hydrator $hydrator): array
```

Commands

```bash
#get payments
php artisan speedy:get-payments {--date_from=} {--date_to=} {--clear= : Clear Database table from records older than X days} {--timeout=20 : Speedy API Call timeout}

#get speedy api status
php artisan speedy:api-status

#sync countries with database
php artisan speedy:sync-countries

#sync offices with database
php artisan speedy:sync-offices {country_id}

#track parcels
php artisan speedy:track {--clear= : Clear Database table from records older than X days} {--timeout=20 : Speedy API Call timeout}
```

Models

```php
CarrierSpeedyCountry
CarrierSpeedyOffice
CarrierSpeedyTracking
CarrierSpeedyPayment
CarrierSpeedyApiStatus
```

Events

```php
CarrierSpeedyTrackingEvent
CarrierSpeedyPaymentEvent
```

## Parcels Tracking

1. Subscribe to tracking event, you will recieve last tracking info, if tracking command is schduled

```php
Event::listen(function (CarrierSpeedyTrackingEvent $event) {
    dd($event->tracking);
});
```

2. Before use of tracking command you need to create your own command and define setUp method

```bash
php artisan make:command TrackCarrierSpeedy
```

3. In app/Console/Commands/TrackCarrierSpeedy define your logic for parcels to be tracked

```php
use Gdinko\Speedy\Commands\TrackCarrierSpeedyBase;

class TrackCarrierSpeedySetup extends TrackCarrierSpeedyBase
{
    protected function setup()
    {
        //define parcel selection logic here
        // $this->parcels = [];
    }
}
```

4. Use the command

```bash
php artisan speedy:track
```

## Examples

Subscribe to payment event

```php
Event::listen(function (CarrierSpeedyPaymentEvent $event) {
    dd($event->payment);
});
```

Check for payments from today

```bash
php artisan speedy:get-payments
```

Get All Countries

```php
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;

dd(
    Speedy::getAllCountries(
        new Request()
    )->toArray()
);
```

Find Country

```php
use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Hydrators\Request;

dd(
    Speedy::findCountry(
        new Request([
            'name' => 'bulgaria'
        ])
    )
);
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dinko359@gmail.com instead of using the issue tracker.

## Credits

-   [Dinko Georgiev](https://github.com/gdinko)
-   [silabg.com](https://www.silabg.com/) :heart:
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
