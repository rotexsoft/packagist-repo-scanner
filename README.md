# Packagist Repo Scanner

This is a collection of scripts meant to be run on linux-like command-line environments.

These scripts use the packagist API to get information about packages on https://packagist.org/

## Installation

You must have the following installed:

- php 8.3+ 
- git
- composer

Clone this repo and cd into the cloned repo and run **composer install**.

> Run **git pull origin** to keep your local copy of this repository up to date from time to time

Then go ahead to run any of the scripts described below.


### get-vendor-packages-info

Gets a list of all packages authored by a specified vendor and returns some
information about each package.

Usage:

**$ ./get-vendor-packages-info \<vendor-name\>**

> **\<vendor-name\>** is the name of the vendor whose packages you want to retrieve information for

For example, to get information about all packages authored by the vendor **monolog**, run code below in your terminal from the directory you cloned this repo into

```bash
./get-vendor-packages-info monolog
```

It should output something like below:

```
Getting package info for `monolog/monolog`
Vendor: `monolog`, Package: `monolog`

Getting package info for `monolog/system-daemon-handler`
Vendor: `monolog`, Package: `system-daemon-handler`

-------------------------------------------------------------------------------
| Package Name                  | Latest Stable Version | Minimum PHP Version |
===============================================================================
| monolog/monolog               | 3.10.0.0              | >=8.1               |
-------------------------------------------------------------------------------
| monolog/system-daemon-handler | 1.0.0.0               | >=5.3.0             |
-------------------------------------------------------------------------------
```


### get-vendor-packages-info-for-composer-dot-json

Gets a list of all packages in the **require** & **require-dev** sections of a specified **composer.json** file and returns some information about each package.

Usage:

**$ ./get-vendor-packages-info-for-composer-dot-json \<path-to-composer-dot-json-file\>**

> **\<path-to-composer-dot-json-file\>** is the absolute or relative path to a **composer.json** file from which package names are to be extracted

For example, to get information about all packages in the composer file located at **/home/joe/my-cool-php-project/composer.json**, run code below in your terminal from the directory you cloned this repo into

```bash
./get-vendor-packages-info-for-composer-dot-json "/home/joe/my-cool-php-project/composer.json"
```

It should output something like below:

```
Getting package info for `knplabs/packagist-api`
Vendor: `knplabs`, Package: `packagist-api`

Getting package info for `spatie/packagist-api`
Vendor: `spatie`, Package: `packagist-api`

Getting package info for `symfony/polyfill-php84`
Vendor: `symfony`, Package: `polyfill-php84`

Getting package info for `symfony/polyfill-php85`
Vendor: `symfony`, Package: `polyfill-php85`

Getting package info for `league/climate`
Vendor: `league`, Package: `climate`

----------------------------------------------------------------------------------------------------
| Package Name           | Latest Stable Version | Locally Installed Version | Minimum PHP Version |
====================================================================================================
| knplabs/packagist-api  | 2.1.4.0               | Not Installed                  | ^7.4 || ^8.0        |
----------------------------------------------------------------------------------------------------
| spatie/packagist-api   | 2.1.1.0               | Not Installed                  | ^8.2                |
----------------------------------------------------------------------------------------------------
| symfony/polyfill-php84 | 1.33.0.0              | Not Installed                  | >=7.2               |
----------------------------------------------------------------------------------------------------
| symfony/polyfill-php85 | 1.33.0.0              | Not Installed                  | >=7.2               |
----------------------------------------------------------------------------------------------------
| league/climate         | 3.10.0.0              | Not Installed                  | ^7.3 || ^8.0        |
----------------------------------------------------------------------------------------------------

```


> You can also pass a relative path like **"./composer.json"**

> The **Locally Installed Version** column only currently works when you specify the **composer.json** file in the cloned copy of this repo. When this tool is setup on packagist, these scripts can be invoked in any php project that requires this package and the locally installed version would be properly calculated in that scenario.