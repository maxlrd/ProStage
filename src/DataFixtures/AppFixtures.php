<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stages;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = \Faker\Factory::create('fr_FR'); // create a French faker

    	/**********************************************
    	***          Création des Formations        ***
    	***********************************************/

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

        /**********************************************
    	***          Création des Entreprises       ***
    	***********************************************/

    	$nbEntreprises = 10;

    	for ($i=0; $i < $nbEntreprises; $i++) { 
    		
    		$entreprise = new Entreprise();

    		//Ajout d'un nom pour l'entreprise via la library faker
    		$entreprise->setNom($faker->company());
    		//Ajout d'une adresse pour l'entreprise via la library faker
    		$entreprise->setAdresse($faker->streetAddress());
    		//Ajout d'une activitée pour l'entreprise via la library faker
    		$entreprise->setActivite($faker->jobTitle());
    		//Ajout d'une ville pour l'entreprise via la library faker
    		$entreprise->setVille($faker->city());
    		//Ajout d'une activitée pour l'entreprise via la library faker
    		$entreprise->setCp((int)$faker->postcode());

    		$manager->persist($entreprise);
    	}

    	/**********************************************
    	***          Création des Stages            ***
    	***********************************************/

        //Envoie des données dans la base de donnée
        $manager->flush();
    }
}
