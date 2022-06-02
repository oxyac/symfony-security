<?php

namespace App\Tests\Service;

use App\Service\VendingService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class VendingServiceTest extends KernelTestCase
{

    public function testDoctrine()
    {
        // (1) boot the Symfony kernel
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $container = static::getContainer();

        // (3) run some service & test the result
        $doctrine = $container->get(VendingService::class);
        $objects = $doctrine->testDoctrine();

        $this->assertEquals($objects, $objects);
    }

}