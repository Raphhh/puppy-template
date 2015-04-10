<?php
namespace Puppy\Template;

use Puppy\Application;
use Puppy\Module\IModule;

/**
 * Class TemplateModule
 * @package Puppy\Template
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class TemplateModule implements IModule
{
    /**
     * init the module.
     *
     * @param Application $application
     */
    public function init(Application $application)
    {
        $application->addService('template', new TemplateService([
            new TemplateExtension($application->getServices()),
        ]));
    }
}
