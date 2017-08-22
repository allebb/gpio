<?php
use PHPUnit\Framework\TestCase;
use Ballen\GPIO\GPIO;
use Ballen\GPIO\Pin;
use Ballen\GPIO\Adapters\VfsAdapter;
use Ballen\GPIO\Exceptions\GPIOException;

/**
 * GPIO
 * A RaspberryPi GPIO library written in PHP.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/allebb/gpio
 * @link http://www.bobbyallen.me
 */
class GPIOTest extends TestCase
{

    private $vfsAdapter;

    public function setUp()
    {
        $this->vfsAdapter = new VfsAdapter();
        parent::setUp(); //
    }

    public function testReceievesDefaultAdapter()
    {
        $gpio = new GPIO();
        $this->assertInstanceOf(GPIO::class, $gpio);
    }

    public function testVfsAdapterInstantiation()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $this->assertInstanceOf(GPIO::class, $gpio);
    }

    public function testNewValidPin()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $pinTest = $gpio->pin(4, GPIO::OUT);
        $this->assertInstanceOf(Pin::class, $pinTest);
    }

    public function testInvalidPinNumber()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $this->expectException(GPIOException::class);
        $this->expectExceptionMessage('Pin number 1 is not supported and therefore cannot be set.');
        $pinTest = $gpio->pin(1, GPIO::OUT);
    }

    public function testInvalidPinType()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $this->expectException(GPIOException::class);
        $this->expectExceptionMessage('Invalid pin type specified, supported types are \'in\' and \'out\'');
        $pinTest = $gpio->pin(4, 'both');
    }

    public function testSettingValidValue()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $pinTest = $gpio->pin(4, GPIO::OUT);
        $pinTest->setValue(GPIO::HIGH);
        $this->assertEquals(1, $pinTest->getValue());
    }

    public function testSettingInvalidValue()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $pinTest = $gpio->pin(4, GPIO::IN);
        $this->expectException(GPIOException::class);
        $this->expectExceptionMessage('Setting the value of a GPIO input pin is not supported!');
        $pinTest->setValue(GPIO::HIGH);
    }

    public function testGettingANonSetValue()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $pinTest = $gpio->pin(4, GPIO::IN);
        $this->assertEquals(0, $pinTest->getValue());
    }

    public function testClearAllPins()
    {
        $gpio = new GPIO($this->vfsAdapter);
        $pinTest = $gpio->pin(4, GPIO::OUT);
        $pinTest->setValue(GPIO::HIGH);

        $this->assertEquals(1, $pinTest->getValue());

        // Clear all pins...
        $gpio->clear();

        $this->assertEquals(0, $pinTest->getValue());

    }
}