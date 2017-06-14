<?php

namespace railto;

use Twig_Extension;
use Twig_SimpleFilter;
use Exception;

class TwigAssetVersionExtension extends Twig_Extension
{
    private $manifest;

    public function __construct($manifest)
    {
        $this->manifest = $manifest;
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('asset_version', array($this, 'getAssetVersion')),
        );
    }

    public function getAssetVersion($filename)
    {
        $manifestPath = $this->manifest;
        if (!file_exists($manifestPath)) {
            throw new Exception(sprintf('Cannot find manifest file: "%s"', $manifestPath));
        }
        $paths = json_decode(file_get_contents($manifestPath), true);
        if (!isset($paths[$filename])) {
            throw new Exception(sprintf('There is no file "%s" in the version manifest!', $filename));
        }
        return $paths[$filename];
    }
    
    public function getName()
    {
        return 'asset_version';
    }
}
