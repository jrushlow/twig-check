<?php
/**
 * User: Jesse Rushlow - Geeshoe Development
 * Date: 1/1/19 - 10:25 AM
 */
declare(strict_types=1);

namespace Geeshoe\TwigCheck\Exceptions;

use Throwable;

class ConfigException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
