<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Railto\TwigAssetVersionExtension;

class TwigAssetVersionExtensionTest extends TestCase
{
    /**
     * @test
     */
    public function extensionObjectInstantiates(): void
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');

        self::assertIsObject($extension);
    }

    /**
     * @test
     */
    public function extensionReturnsValidData(): void
    {
        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');

        self::assertEquals('css/app-1f56b8a83a.css', $extension->getAssetVersion('css/app.css'));
        self::assertEquals('css/admin-8364d07654.css', $extension->getAssetVersion('css/admin.css'));
    }

    /**
     * @test
     */
    public function extensionThrowsExceptionOnInvalidFile(): void
    {
        $this->expectException(\Exception::class);

        $extension = new TwigAssetVersionExtension(__DIR__.'/rev-manifest.json');
        $extension->getAssetVersion('no/file.exists');
    }

    /**
     * @test
     */
    public function extensionThrowsExceptionIfNoManifestFileIsProvided(): void
    {
        $this->expectException(\Exception::class);

        $extension = new TwigAssetVersionExtension(__DIR__.'/no-manifest.json');
        $extension->getAssetVersion('css/admin.css');
    }
}
