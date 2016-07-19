<?php

namespace Wambo\ComposerInstaller;

use Composer\Package\PackageInterface;
use Wambo\ComposerInstaller\Exception\InvalidArgumentException;

class WamboInstallerService
{

    private $package;

    /**
     * WamboInstallerService constructor.
     * @param $package
     */
    public function __construct(PackageInterface $package)
    {
        $this->package = $package;
    }

    /**
     * @return string
     */
    public function getBootstrapClassName() : string
    {
        $extra = $this->package->getExtra();

        if(!array_key_exists(WamboInstaller::EXTRA_BOOTSTRAP_CLASS_KEY, $extra)){
            throw new InvalidArgumentException('Wambo bootstap class not found');
        }

        return $extra[WamboInstaller::EXTRA_BOOTSTRAP_CLASS_KEY];
    }
}
