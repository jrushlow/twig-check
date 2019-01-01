<?php
/**
 * User: Jesse Rushlow - Geeshoe Development
 * Date: 1/1/19 - 10:29 AM
 */

namespace Geeshoe\TwigCheckTests;

use Geeshoe\TwigCheck\Exceptions\ConfigException;
use Geeshoe\TwigCheck\TwigFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class Test
 *
 * @package Geeshoe\TwigCheckTests
 */
class Test extends TestCase
{
    /**
     * @var TwigFactory
     */
    public $twigFactory;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->twigFactory = new TwigFactory();
    }

    /**
     * @throws ConfigException
     */
    public function testTwigThrowsTwigErrorLoaderExceptionWithBadPath(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('Template base dir is invalid.');
        $this->twigFactory->getTwig('/path/to/no/where');
    }
}
