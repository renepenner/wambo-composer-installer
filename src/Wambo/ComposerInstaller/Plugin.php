<?php

namespace Wambo\ComposerInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{

    public function activate(Composer $composer, IOInterface $io){
        $installer = new WamboInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
