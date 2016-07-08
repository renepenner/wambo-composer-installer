<?php

namespace Wambo\ComposerInstaller;

use Composer\Package\PackageInterface;

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
    public function getAutoloadNamespace()
    {
        $autoload = $this->package->getAutoload();

        if ( !array_key_exists(WamboInstaller::AUTOLOAD_TYPE, $autoload) ) {
            throw new \Exception('No PSR-4 Namespace found in package');
        }

        $namespaces = $autoload[WamboInstaller::AUTOLOAD_TYPE];
        $namespace_array = array_keys($namespaces);

        if (count($namespace_array) !== 1) {
            throw new \Exception('No unique PSR-4 namespace.');
        }

        return $namespace_array[0];
    }
}