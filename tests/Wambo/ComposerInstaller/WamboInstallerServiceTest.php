<?php

namespace Wambo\ComposerInstaller;

use Composer\Package\PackageInterface;
use PHPUnit\Framework\TestCase;

class WamboInstallerServiceTest extends TestCase
{

    /**
     * @test
     */
    public function testGetPSR4AutoloadReturnNamespaceString()
    {
        // arrange
        $package = $this->getMockBuilder(PackageInterface::class)->getMock();
        $package->method('getAutoload')->willReturn(
            array('PSR-4' => array(
                '\\Wambo\\SomePackage' => 'src/Wambo/SomePackage'
            ))
        );
        $wamboInstallerService = new WamboInstallerService($package);

        //act
        $namespaceString = $wamboInstallerService->getAutoloadNamespace();

        //assert
        $this->assertEquals('\\Wambo\\SomePackage', $namespaceString);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function testGetPSR4AutoloadThrowExceptionNotUnique()
    {
        // arrange
        $package = $this->getMockBuilder(PackageInterface::class)->getMock();
        $package->method('getAutoload')->willReturn(
            array('PSR-4' => array(
                '\\Wambo\\SomePackage' => 'src/Wambo/SomePackage',
                '\\Wambo\\OtherPackage' => 'src/Wambo/OtherPackage'
            ))
        );
        $wamboInstallerService = new WamboInstallerService($package);

        //act
        $wamboInstallerService->getAutoloadNamespace();
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function testGetPSR4AutoloadThrowExceptionNoNamespaceFound()
    {
        // arrange
        $package = $this->getMockBuilder(PackageInterface::class)->getMock();
        $package->method('getAutoload')->willReturn(
            array('PSR-4' => array(
            ))
        );
        $wamboInstallerService = new WamboInstallerService($package);

        //act
        $wamboInstallerService->getAutoloadNamespace();
    }
}