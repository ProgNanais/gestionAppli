<?php

namespace App\DataFixtures;

use App\Entity\ApplicationList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApplicationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++) {
            $application = new ApplicationList();
            $application->setAppName("Nom de l'application n°$i")
                        ->setAppDateCreated(new \DateTime())
                        ->setAppDescription("Une grande description de l'application numéro $i")
                        ->setAppVersion("C'est la version 8.0.1 de PHP")
                        ->setAppState("En cours de développement");
            $manager->persist($application);
        }

        $manager->flush();
    }
}
