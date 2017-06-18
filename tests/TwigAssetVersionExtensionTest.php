<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Railto\TwigAssetVersionExtension;

class TwigAssetVersionExtensionTest extends TestCase
{
    /**
     * @test
     */
    public function extensionObjectInstantiates()
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');

        $this->assertTrue(is_object($extension));
    }

    /**
     * @test
     */
    public function extensionReturnsValidData()
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');

        $this->assertEquals('css/app-1f56b8a83a.css', $extension->getAssetVersion('css/app.css'));
        $this->assertEquals('css/admin-8364d07654.css', $extension->getAssetVersion('css/admin.css'));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function extensionThrowsExceptionOnInvalidFile()
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');

        $extension->getAssetVersion('no/file.exists');
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function extensionThrowsExceptionIfNoManifestFileIsProvided()
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/no-manifest.json');

        $extension->getAssetVersion('css/admin.css');
    }
}
