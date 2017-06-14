<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Railto\TwigAssetVersionExtension;

require_once __DIR__.'/../vendor/autoload.php';

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
}
