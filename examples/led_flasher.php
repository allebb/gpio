<?php

require_once '../vendor/autoload.php';

use Ballen\GPIO\GPIO;

// Create a new instane of the GPIO class.
$gpio = new GPIO();

// Configure our 'LED' output...
$led = $gpio->setup(18, GPIO::OUT);

// Create a basic loop that runs continuously...
while (true) {
    // Turn the LED on...
    $led->setValue(GPIO::HIGH);
    // Wait half a second...
    sleep(0.5);
    // Turn off the LED...
    $led->setValue(GPIO::LOW);
    // Wait half a second...
    usleep(0.5);
}