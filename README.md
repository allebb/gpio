# GPIO

[![Build](https://github.com/allebb/gpio/workflows/build/badge.svg)](https://github.com/allebb/gpio/actions)
[![Code Coverage](https://codecov.io/gh/allebb/gpio/branch/master/graph/badge.svg)](https://codecov.io/gh/allebb/gpio)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/gpio/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/gpio/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/gpio/badges/gpa.svg)](https://codeclimate.com/github/allebb/gpio)
[![Latest Stable Version](https://poser.pugx.org/ballen/gpio/v/stable)](https://packagist.org/packages/ballen/gpio)
[![Latest Unstable Version](https://poser.pugx.org/ballen/gpio/v/unstable)](https://packagist.org/packages/ballen/gpio)
[![License](https://poser.pugx.org/ballen/gpio/license)](https://packagist.org/packages/ballen/gpio)

A RaspberryPi GPIO library written in PHP, This library makes it a breeze to work with simple inputs and outputs such as buttons, switches, LED's, motors and relays.

## Requirements

* PHP >= 7.3.0

This library is unit tested against PHP 7.3, 7.4, 8.0, 8.1 and 8.2!

If you need to use an older version of PHP, you should instead install the 1.x version of this library (see below for details).

License
-------

This library is released under the [GPLv3](https://raw.githubusercontent.com/allebb/gpio/master/LICENSE) license, you are welcome to use it, improve it and contribute your changes back!

Installation
------------

The recommended way of installing the latest version of this library is via. [Composer](http://getcomposer.org); To install using Composer type the following command at the console:

```shell
composer require ballen/gpio
```

**If you need to use an older version of PHP, version 1.x.x supports PHP 7.1 and 7.2, you can install this version using Composer with this command instead:**

```shell
composer require ballen/gpio ^1.0
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

I use [GitHub Actions](https://github.com/) for continuous integration, which triggers tests for PHP 7.3, 7.4, 8.0, 8.1 and 8.2 every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the GPIO Library (which will include PHPUnit as part of the require-dev dependencies)
composer install

# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be run and a report generated (this does require XDebug to be installed)...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().
