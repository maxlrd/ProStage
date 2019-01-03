<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	//Création de la Formation Informatique
        $formationInfo = new Formation();
        $formationInfo->setNom("Informatique");
        $manager->persist($formationInfo);

        //Création de la Formation Programmation Avancée
        $formationProgAv = new Formation();
        $formationProgAv->setNom("Programmation Avancée");
        $manager->persist($formationProgAv);

        //Création de la Formation MultiMédia
        $formationMultiMedia = new Formation();
        $formationMultiMedia->setNom("MultiMédia");
        $manager->persist($formationMultiMedia);

        //Création de la Formation Génie Industriel et Maintenance
        $formationGIM = new Formation();
        $formationGIM->setNom("Génie Industriel et Maintenance");
        $manager->persist($formationGIM);

        //Envoie des données dans la base de donnée
        $manager->flush();
    }
}
