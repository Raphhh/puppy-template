<?php
namespace Puppy\Template;

use Twig_Environment;
use Twig_Extension_Debug;
use Twig_ExtensionInterface;
use Twig_Loader_Filesystem;

/**
 * Class Template
 * @package Puppy\Service
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class TemplateService
{
    /**
     * @var Twig_ExtensionInterface[]
     */
    private $extensions;

    /**
     * @param array $extensions
     */
    public function __construct(array $extensions = [])
    {
        $this->setExtensions($extensions);
    }

    /**
     * @param \ArrayAccess $services
     * @throws \InvalidArgumentException
     * @return Twig_Environment
     */
    public function __invoke(\ArrayAccess $services)
    {
        if (empty($services['config'])) {
            throw new \InvalidArgumentException('Service "config" not found');
        }
        $this->validConfig($services['config']);

        $twig = $this->buildTwig($services['config']);
        $this->initExtensions($twig);

        return $twig;
    }

    /**
     * @param \ArrayAccess $config
     * @throws \InvalidArgumentException
     */
    private function validConfig(\ArrayAccess $config)
    {
        if (empty($config['template.directory.main'])) {
            throw new \InvalidArgumentException(
                'Config must define the key "template.directory.main" for the path to the template files'
            );
        }

        if (!isset($config['template.directory.cache'])) {
            throw new \InvalidArgumentException(
                'Config must define the key "template.directory.cache" for the path to the template cache'
            );
        }
    }

    /**
     * @param \ArrayAccess $config
     * @return Twig_Environment
     */
    private function buildTwig(\ArrayAccess $config)
    {
        return new Twig_Environment(
            new Twig_Loader_Filesystem($config['template.directory.main']),
            array(
                'cache' => $config['template.directory.cache'],
                'debug' => !empty($config['template.debug']),
                'strict_variables' => true,
            )
        );
    }

    /**
     * @param Twig_Environment $twig
     * @return Twig_Environment
     */
    private function initExtensions(Twig_Environment $twig)
    {
        $twig->addExtension(new Twig_Extension_Debug());
        foreach($this->getExtensions() as $extensions){
            $twig->addExtension($extensions);
        }
        return $twig;
    }

    /**
     * Getter of $extensions
     *
     * @return array
     */
    private function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * Setter of $extensions
     *
     * @param array $extensions
     */
    private function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
    }
}
