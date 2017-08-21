<?php
namespace Ballen\GPIO;

use Ballen\GPIO\Adapters\RPiAdapter;
use Ballen\GPIO\Exceptions\GPIOException;
use Ballen\GPIO\Interfaces\AdapterInterface;
use PHPUnit\Runner\Exception;

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

    const LOW = 0;

    const HIGH = 1;

    const IN = "in";

    const OUT = "out";

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
        $this->ioAdapter = RPiAdapter::class;
        if ($adapter) {
            $this->ioAdapter = $adapter;
        }
    }

    /**
     * Configure a pin
     *
     * @param int $pin The GPIO pin number
     * @param int $type The pin type (input or output) - Use GPIO::IN and GPIO::OUT
     * @return Pin
     * @throws GPIOException
     */
    public function setup(int $pin, int $type): Pin
    {

        if (!in_array($type, ["in", "out"])) {
            throw new GPIOException("Invalid pin type specified, supported types are 'in' and 'out'.");
        }

        if (in_array($pin, GPIO::PINS)) {
            return new Pin($pin, $type);
        }

        throw new GPIOException("Pin number {$pin} is not supported and therefore cannot be set.");
    }

    /**
     * Reset all of the GPIO pins.
     *
     * @return void
     */
    public function clear()
    {
        foreach (GPIO::PINS as $pin) {
            $reset = new Pin($pin, GPIO::OUT);
            $reset->setValue(GPIO::LOW);
        }
    }

}