<?php
namespace Ballen\GPIO\Adapters;

use Ballen\GPIO\Interfaces\AdapterInterface;

/**
 * GPIO
 * A RaspberryPi GPIO library written in PHP.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/gpio
 * @link http://www.bobbyallen.me
 * @package Ballen\GPIO\Adapters
 */
class RPiAdapter implements AdapterInterface
{

    const GPIO_PATH = "/sys/class/gpio";

    /**
     * Set the direction of the pin (input or output)
     *
     * @param int $pin The BCM pin number
     * @param string $direction The type/direction of the pin - Use GPIO::IN and GPIO::OUT
     * @return bool
     */
    public function setDirection(int $pin, string $direction): bool
    {
        system("echo {$direction} > /sys/class/gpio/gpio{$pin}/direction");

        if (!file_exists("/sys/class/gpio/gpio{$pin}/direction")) {
            return false;
        }
        if (file_get_contents("/sys/class/gpio/gpio{$pin}/direction") != $direction) {
            return false;
        }
        return true;
    }

    /**
     * Write a value to an output pin.
     *
     * @param int $pin The BCM pin number.
     * @param int $value The output value (0,1) - Use GPIO::HIGH and GPIO::LOW
     * @return bool
     */
    public function write(int $pin, int $value): bool
    {

    }

    /**
     * Read the value of an input/output pin.
     *
     * @param int $pin The BCM pin number
     * @return int The current value of the pin.
     */
    public function read(int $pin): int
    {

    }

    /**
     * Exports the Pin (enabling it's use)
     *
     * @param int $pin The pin to export/enable.
     * @return bool
     */
    private function export(int $pin)
    {
        system("echo {$pin} > " . self::GPIO_PATH . "/export");

        if (file_exists("/sys/class/gpio/gpio{$pin}")) {
            return true;
        }
        return false;
    }
}