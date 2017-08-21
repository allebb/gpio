<?php

namespace Ballen\GPIO;

use Ballen\GPIO\Exceptions\GPIOException;
use Ballen\GPIO\Interfaces\AdapterInterface;

class Pin
{

    /**
     * The BCM pin number
     *
     * @var int
     */
    private $pin;

    /**
     * The pin type (Input or Output)
     *
     * @var string
     */
    private $type;

    /**
     * The GPIO Interface Adapter.
     *
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * Pin constructor.
     *
     * @param int $pin The BCM pin number
     * @param string $type The pin type (Input or Output)
     * @param AdapterInterface $adapter The GPIO adapter interface
     */
    public function __construct(int $pin, string $type, AdapterInterface $adapter)
    {
        $this->adapter = $adapter;

        $this->validatePin($pin);
        $this->validateType($type);

        $this->type = $type;
    }

    /**
     * Validates that the pin number is a valid GPIO pin.
     *
     * @param int $pin The BCM pin number
     * @throws GPIOException
     */
    private function validatePin(int $pin)
    {
        if (!in_array($pin, GPIO::PINS)) {
            throw new GPIOException("Pin number {$pin} is not supported and therefore cannot be set.");
        }
    }

    /**
     * Validates that the pin type is valid.
     *
     * @param string $type The GPIO pin type.
     * @throws GPIOException
     */
    private function validateType(string $type)
    {
        if (!in_array($type, ["in", "out"])) {
            throw new GPIOException("Invalid pin type specified, supported types are 'in' and 'out'.");
        }
    }

    /**
     * Set the value of a GPIO output pin.
     *
     * @param int $value The output state to set (GPIO::HIGH or GPIO::LOW)
     * @return bool
     * @throws GPIOException
     */
    public function setValue(int $value): bool
    {
        if ($this->type == GPIO::IN) {
            throw new GPIOException('Setting the value of a GPIO input pin is not supported!');
        }
        return $this->adapter->write($this->pin, intval($value));
    }

    /**
     * Returns the state of the input/output pin.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->adapter->read($this->pin);
    }
}