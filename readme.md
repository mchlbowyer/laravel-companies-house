[![Latest Version on Packagist](https://img.shields.io/packagist/v/mchlbowyer/laravel-companies-house.svg?style=flat-square)](https://packagist.org/packages/mchlbowyer/laravel-companies-house)
[![Total Downloads](https://img.shields.io/packagist/dt/mchlbowyer/laravel-companies-house.svg?style=flat-square)](https://packagist.org/packages/mchlbowyer/laravel-companies-house)

<h1 align="center">
Laravel Companies House
</h1>

<h3 align="center">
A Laravel package for retrieving data from Companies House
</h3>

<h3 align="center" style="color: red">
`composer require mchlbowyer/laravel-companies-house`
</h3>


# Documentation and install instructions

Companies House API documentation can be found at:
https://developer.company-information.service.gov.uk/api/docs/

## Application Register

To use Companies House an application needs creating at https://developer.company-information.service.gov.uk/manage-applications

## Install

Take a note of the API key and add it to your .env file

```
COMPANIES_HOUSE_KEY=
```

Via Composer

```
composer require mchlbowyer/laravel-companies-house
```

You can publish the config file with:

```php
php artisan vendor:publish --provider="Mchlbowyer\CompaniesHouse\CompaniesHouseServiceProvider" --tag="config"
```

When published, the config/companieshouse.php config file contains:

```php
<?php

return [

    /*
    * the key is set from the Companies House to identify the application
    * https://developer.companieshouse.gov.uk/developer/applications
    */
    'key' => env('COMPANIES_HOUSE_KEY'),
];
```

## Usage

In a controller import the class:

```
use Mchlbowyer\CompaniesHouse\Facades\CompaniesHouse;
```

In a view or closure call the facade:

```php
CompaniesHouse::get('path');
```

You can call CompaniesHouse::get followed by the endpoint you want to call, for instance, to call company
profile (https://developer-specs.company-information.service.gov.uk/companies-house-public-data-api/reference/company-profile/company-profile)

```php
CompaniesHouse::get('company/123456');
```

To make things a little easier there are also trait classes provided:

Each Trait class provides convenient methods that call the endpoints, process the data, and return JSON of the
results.

## Search

Search across all indexed information.

```php
CompaniesHouse::search($term)
```

Searches companies

```php
CompaniesHouse::searchCompany($term)
```

Search Officer

```php
CompaniesHouse::searchOfficer($term)
```

Search Officer Disqualified

```php
CompaniesHouse::searchOfficerDisqualified($term)
```

## Companies

Get Company

```php
CompaniesHouse::getCompany($companyNumber)
```

Get Company Address

```php
CompaniesHouse::getCompanyAddress($companyNumber)
```

Get Company Officer

```php
CompaniesHouse::getCompanyOfficer($companyNumber)
```

Get Company Filing

```php
CompaniesHouse::getCompanyFiling($companyNumber)
```

Get Company Filing Item

```php
CompaniesHouse::getCompanyFilingItem($companyNumber)
```

Get Company Insolvency

```php
CompaniesHouse::getCompanyInsolvency($companyNumber)
```

Get Company Charge

```php
CompaniesHouse::getCompanyCharge($companyNumber)
```

Get Company Charge Item

```php
CompaniesHouse::getCompanyChargeItem($companyNumber)
```

Get Company Establishment

```php
CompaniesHouse::getCompanyEstablishment($companyNumber)
```

Get Company Register

```php
CompaniesHouse::getCompanyRegister($companyNumber)
```

Get Company Exemption

```php
CompaniesHouse::getCompanyExemption(($companyNumber)
```

## Officer

Get Officer Appointment

```php
CompaniesHouse::getOfficerAppointment($officerId)
```

Get Officer Disqualification

```php
CompaniesHouse::getOfficerDisqualification($officerId)
```

Get Officer Disqualification Corp

```php
CompaniesHouse::getOfficerDisqualificationCorp($officerId)
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Contributions are welcome and will be fully credited.

Contributions are accepted via Pull Requests on [Github](https://github.com/mchlbowyer/laravel-companies-house).

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept
  up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs
  is not an option.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email hi@mikecod.es instead of using the issue tracker.
