<?php
namespace Ballen\GPIO;

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

    /**
     * The default GPIO interface adapter.
     */
    const DEFAULT_ADAPTER = 'Ballen\GPIO\Adapters\RPiAdapter';

    public function __construct()
    {
    }

}