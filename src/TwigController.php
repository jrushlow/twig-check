<?php
/**
 * User: Jesse Rushlow - Geeshoe Development
 * Date: 1/7/19 - 8:19 AM
 */
declare(strict_types=1);

namespace Geeshoe\TwigCheck;

use Geeshoe\TwigCheck\Exceptions\TemplateException;

/**
 * Class TwigController
 *
 * @package Geeshoe\TwigCheck
 */
class TwigController
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * TwigController constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param string $templateName
     * @param array  $twigVars
     * @return string
     */
    public function getTemplate(string $templateName, array $twigVars): string
    {
        try {
            return $this->twig->render($templateName, $twigVars);
        } catch (\Twig_Error_Loader $errorLoader) {
            throw new TemplateException(
                'Unable to find template.',
                0,
                $errorLoader
            );
        } catch (\Twig_Error_Syntax $errorSyntax) {
            throw new TemplateException(
                'Unable to compile template.',
                0,
                $errorSyntax
            );
        } catch (\Twig_Error_Runtime $errorRuntime) {
            throw new TemplateException(
                'Unable to render template.',
                0,
                $errorRuntime
            );
        }
    }
}
