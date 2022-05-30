<?php

namespace App\Service;

use App\Entity\Gnome;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

class VendingService
{

    private string $copyright;
    private ManagerRegistry $managerRegistry;

    public function __construct(LoggerInterface $logger, ManagerRegistry $managerRegistry, string $copyright)
    {
        $this->managerRegistry = $managerRegistry;
        $this->copyright = $copyright;
    }

    public function testDoctrine(){


        $entityManager = $this->managerRegistry->getManager();

        return $entityManager->getRepository(Gnome::class)->findAll();
    }
}