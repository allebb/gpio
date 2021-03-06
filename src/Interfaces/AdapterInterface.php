<?php
namespace Ballen\GPIO\Interfaces;

/**
 * GPIO
 * A RaspberryPi GPIO library written in PHP.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/gpio
 * @link http://www.bobbyallen.me
 * @package Ballen\GPIO\Interfaces
 */
interface AdapterInterface
{
    /**
     * Write a value to an output pin.
     *
     * @param int $pin The BCM pin number.
     * @param int $value The output value (0,1) - Use GPIO::HIGH and GPIO::LOW
     * @return bool
     */
    public function write(int $pin, int $value): bool;

    /**
     * Read the value of an input/output pin.
     *
     * @param int $pin The BCM pin number
     * @return int The current value of the pin.
     */
    public function read(int $pin): int;

    /**
     * Set the direction of the pin (input or output)
     *
     * @param int $pin The BCM pin number
     * @param string $direction The type/direction of the pin - Use GPIO::IN and GPIO::OUT
     * @param bool $invert Invert the logic so that high->low and low->high
     * @return bool
     */
    public function setDirection(int $pin, string $direction, bool $invert = false): bool;

}