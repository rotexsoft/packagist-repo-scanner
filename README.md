# Packagist Repo Scanner

This is a collection of scripts meant to be run on linux-like command-line environments.

These scripts use the packagist API to get information about packages on https://packagist.org/

## Installation

You must have the following installed:

- php 8.3+ 
- git
- composer

Clone this repo and cd into the cloned repo and run **composer install**.

Then go ahead to run any of the scripts described below.


### get-vendor-packages-info

Gets a list of all packages authored by a specified vendor and returns some
information about each package.

Usage:

**$ ./get-vendor-packages-info <vendor-name>**

> **<vendor-name>** is the name of the vendor whose packages you want to retrieve information for

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

