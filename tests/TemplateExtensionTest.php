<?php
namespace Puppy\Template;

/**
 * Class TemplateExtensionTest
 * @package Puppy\Service\Twig
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class TemplateExtensionTest extends \PHPUnit_Framework_TestCase
{

    public function testGetName()
    {
        $extension = new TemplateExtension(new \ArrayObject());
        $this->assertSame('puppy-twig-extension', $extension->getName());
    }

    public function testGetGlobals()
    {
        $services = new \ArrayObject();
        $extension = new TemplateExtension($services);
        $this->assertSame(
            ['services' => $services],
            $extension->getGlobals());
    }

    public function testGetFilters()
    {
        $extension = new TemplateExtension(new \ArrayObject([
            'config' => [ 'baseUrl' => '/my/url/']
        ]));
        $filters = $extension->getFilters();
        $this->assertCount(1, $filters);
        $this->assertCount(1, $filters);
        $callback = $filters[0]->getCallable();
        $this->assertSame('/my/url/string/', $callback('/string/'));
    }
}
