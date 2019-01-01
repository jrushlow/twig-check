<?php
/**
 * User: Jesse Rushlow - Geeshoe Development
 * Date: 1/1/19 - 10:23 AM
 */
declare(strict_types=1);

namespace Geeshoe\TwigCheck;

use Geeshoe\TwigCheck\Exceptions\ConfigException;

/**
 * Class TwigFactory
 *
 * @package Geeshoe\TwigCheck
 */
class TwigFactory
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var \Twig_Loader_Filesystem
     */
    protected $loader;

    /**
     * @var string Absolute path to template base directory.
     */
    public $templateDir;

    /**
     * @param string Template dir path.
     * @return \Twig_Environment
     * @throws ConfigException
     */
    public function getTwig(string $templateDir): \Twig_Environment
    {
        $this->templateDir = $templateDir;

        $this->buildTwigInstance();

        return $this->twig;
    }

    /**
     * Create the Twig environment and set extensions.
     *
     * @throws ConfigException
     */
    protected function buildTwigInstance(): void
    {
        $this->twig = new \Twig_Environment(
            $this->registerTwigTemplateLoader()
        );
    }

    /**
     * @return \Twig_Loader_Filesystem
     * @throws ConfigException
     */
    protected function registerTwigTemplateLoader(): \Twig_Loader_Filesystem
    {
        $templateDir = $this->templateDir;

        try {
            $this->loader = new \Twig_Loader_Filesystem([$templateDir]);
        } catch (\Twig_Error_Loader $exception) {
            throw new ConfigException(
                'Template base dir is invalid.',
                0,
                $exception
            );
        }

        return $this->loader;
    }
}
