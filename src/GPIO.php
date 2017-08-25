<?php
namespace Ballen\GPIO;

use Ballen\GPIO\Adapters\RPiAdapter;
use Ballen\GPIO\Interfaces\AdapterInterface;

/**
 * GPIO
 * A RaspberryPi GPIO library written in PHP.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/gpio
 * @link http://www.bobbyallen.me
 */
class GPIO
{

    /**
     * GPIO Pin State Low
     */
    const LOW = 0;

    /**
     * GPIO Pin State High
     */
    const HIGH = 1;

    /**
     * GPIO Pin Type Input
     */
    const IN = "in";

    /**
     * GPIO Pin Type Output
     */
    const OUT = "out";

    /**
     * Supported GPIO BCM Pin numbers.
     */
    const PINS = [4, 5, 6, 12, 13, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27];

    /**
     * The GPIO Interface Adapter.
     *
     * @var AdapterInterface
     */
    private $ioAdapter;

    /**
     * GPIO constructor.
     *
     * @param AdapterInterface|null $adapter
     */
    public function __construct(AdapterInterface $adapter = null)
    {
        $this->ioAdapter = new RPiAdapter();
        if ($adapter) {
            $this->ioAdapter = $adapter;
        }
    }

    /**
     * Configure a pin
     *
     * @param int $pin The GPIO pin number
     * @param string $type The pin type (input or output) - Use GPIO::IN and GPIO::OUT
     * @param bool $invert Invert the logic so that high->low and low->high
     * @return Pin
     */
    public function pin(int $pin, string $type, bool $invert = false): Pin
    {
        return new Pin($pin, $type, $this->ioAdapter, $invert);
    }

    /**
     * Reset all of the GPIO pins.
     *
     * @return void
     */
    public function clear()
    {
        foreach (GPIO::PINS as $pin) {
            $reset = new Pin($pin, GPIO::OUT, $this->ioAdapter);
            $reset->setValue(GPIO::LOW);
        }
    }

}