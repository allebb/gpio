<?php

require_once '../vendor/autoload.php';

use Ballen\GPIO\GPIO;
use Ballen\GPIO\Pin;
use Ballen\GPIO\Adapters\VfsAdapter;

// Create a new instane of the GPIO class.
$gpio = new GPIO(new VfsAdapter());

// Configure our 'LED' output...
$led = $gpio->pin(18, GPIO::OUT);

// A simple function to output the current LED state...
function getLedState(Pin $led)
{
    ($led->getValue() == GPIO::HIGH) ? print "The LED is On! \r" : print "The LED is Off! \r";
}

// Create a basic loop that runs continuously...
while (true) {
    // Turn the LED on...
    $led->setValue(GPIO::HIGH);
    getLedState($led);
    // Wait for one second...
    sleep(1);
    // Turn off the LED...
    $led->setValue(GPIO::LOW);
    getLedState($led);
    // Wait for one second...
    sleep(1);
}

