# GPIO

[![Build Status](https://scrutinizer-ci.com/g/allebb/gpio/badges/build.png?b=master)](https://scrutinizer-ci.com/g/allebb/gpio/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/allebb/gpio/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/allebb/gpio/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/gpio/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/gpio/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/gpio/badges/gpa.svg)](https://codeclimate.com/github/allebb/metar)
[![Latest Stable Version](https://poser.pugx.org/ballen/gpio/v/stable)](https://packagist.org/packages/ballen/gpio)
[![Latest Unstable Version](https://poser.pugx.org/ballen/gpio/v/unstable)](https://packagist.org/packages/ballen/gpio)
[![License](https://poser.pugx.org/ballen/gpio/license)](https://packagist.org/packages/ballen/gpio)

A RaspberryPi GPIO library written in PHP, This library makes it a breeze to work with simple inputs and outputs such as buttons, switches, LED's, motors and relays.

## Requirements

* PHP >= 7.1.0

This library is unit tested against PHP 7.1, 7.2, 7.3 and the bleeding edge (nightly build)!

License
-------

This library is released under the [GPLv3](https://raw.githubusercontent.com/allebb/gpio/master/LICENSE) license, you are welcome to use it, improve it and contribute your changes back!

Installation
------------

The recommended way of installing this library is via. [Composer](http://getcomposer.org); To install using Composer type the following command at the console:

```shell
composer require ballen/gpio
```

Example usage
-------------

An example of a flashing a single LED:

```php
use Ballen\GPIO\GPIO;

// Create a new instane of the GPIO class.
$gpio = new GPIO();

// Configure our 'LED' output...
$led = $gpio->pin(18, GPIO::OUT);

// Create a basic loop that runs continuously...
while (true) {
    // Turn the LED on...
    $led->setValue(GPIO::HIGH);
    // Wait for one second...
    sleep(1);
    // Turn off the LED...
    $led->setValue(GPIO::LOW);
    // Wait for one second...
    sleep(1);
}
```

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [TravisCI](https://travis-ci.org/) for continuous integration, which triggers tests for PHP 7.1, 7.2 and the latest nightly build every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the GPIO Library (which will include PHPUnit as part of the require-dev dependencies)
composer install

# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran and a report generated (this does require XDebug to be installed)...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().
