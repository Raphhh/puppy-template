<?php
namespace Puppy\Template;

use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Class TwigExtension
 * @package Puppy\Service\Twig
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class TemplateExtension extends Twig_Extension
{
    /**
     * @var \ArrayAccess
     */
    private $services;

    /**
     * @param \ArrayAccess $services
     */
    public function __construct(\ArrayAccess $services)
    {
        $this->setServices($services);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'puppy-twig-extension';
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return [
            'services' => $this->getServices(),
        ];
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('link', function($string){
                $services = $this->getServices();
                if(isset($services['config']['baseUrl'])){
                    return rtrim($services['config']['baseUrl'], '/') . '/' . ltrim($string, '/');
                }
                return $string;
            }),
        ];
    }

    /**
     * Getter of $services
     *
     * @return \ArrayAccess
     */
    private function getServices()
    {
        return $this->services;
    }

    /**
     * Setter of $services
     *
     * @param \ArrayAccess $services
     */
    private function setServices(\ArrayAccess $services)
    {
        $this->services = $services;
    }
}
