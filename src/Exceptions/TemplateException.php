<?php
/**
 * User: Jesse Rushlow - Geeshoe Development
 * Date: 1/7/19 - 8:21 AM
 */
declare(strict_types=1);

namespace Geeshoe\TwigCheck\Exceptions;

/**
 * Class TemplateException
 *
 * @package Geeshoe\TwigCheck\Exceptions
 */
class TemplateException extends \RuntimeException
{
    /**
     * TemplateException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
