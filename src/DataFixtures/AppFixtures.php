<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formationInfo = new Formation();
        $formationInfo->setNom("Informatique");

        $manager->persist($formationInfo);

        $manager->flush();
    }
}
