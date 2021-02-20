<?php

namespace Railto;

use Twig\Extension\AbstractExtension;
use Exception;
use Twig\TwigFilter;

/**
 * Class TwigAssetVersionExtension
 * @package Railto\TwigAssetVersionExtension
 */
class TwigAssetVersionExtension extends AbstractExtension
{
    /**
     * @var string
     */
    private $manifest;

    /**
     * TwigAssetVersionExtension constructor.
     * @param $manifest
     */
    public function __construct($manifest)
    {
        $this->manifest = $manifest;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('asset_version', array($this, 'getAssetVersion')),
        );
    }

    /**
     * @param $filename
     * @return mixed
     * @throws Exception
     */
    public function getAssetVersion($filename)
    {
        if (!file_exists($this->manifest)) {
            throw new Exception(sprintf('Cannot find manifest file: "%s"', $this->manifest));
        }
        $paths = json_decode(file_get_contents($this->manifest), true);
        if (!isset($paths[$filename])) {
            throw new Exception(sprintf('There is no file "%s" in the version manifest!', $filename));
        }
        return $paths[$filename];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'asset_version';
    }
}
