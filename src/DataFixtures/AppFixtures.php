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
    	***          Création des Entreprises       ***
    	***********************************************/

    	$nbEntreprises = 10;
        $tabEntreprise = array();

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

            $tabEntreprise[$i] = $entreprise;

            $manager->persist($entreprise);
        }

        /**********************************************
    	***          Création des Formations        ***
    	***********************************************/

    	//Création de la Formation Informatique
        /*$formationInfo = new Formation();
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
        $manager->persist($formationGIM);*/

        $tabFormations = array(
        	"Info" => "Informatique",
        	"ProgAv" => "Programmation Avancée",
        	"MultiMedia" => "MultiMédia",
        	"GIM" => "Génie Industriel et Maintenance"
        );

    	/**********************************************
    	***   Création des Stages avec Formations   ***    
    	***********************************************/

    	foreach ($tabFormations as $codeFormation => $nomFormation) {

    		//Création des formations
    		$formation = new Formation();
        	$formation->setNom("$nomFormation");
        	$manager->persist($formation);
    		
    		//Création de plusieurs stages associés aux entreprises
    		$nbStagesAGenerer = $faker->numberBetween($min = 0, $max = 9);

    		for ($numStage=0; $numStage < $nbStagesAGenerer ; $numStage++) { 
    			
    			$stage = new Stages();
    			$stage->setTitre($faker->realText($maxNbChars = 100, $indexSize = 2));
    			$stage->setDescription($faker->realText($maxNbChars = 500, $indexSize = 2));
    			$stage->setEmail($faker->freeEmail());
    			
    			//Création d'une relation Stages --> Formation
    			$stage->addFormation($formation);

    			//Sélectionner une entreprise parmis les 10 générées
    			$numEntreprise = $faker->numberBetween($min = 0, $max = 9);

    			//Création d'une relation Stages --> Entreprise
    			$stage->setEntreprise($tabEntreprise[$numEntreprise]);

    			//Création d'une relation Entreprise --> Stages
    			$tabEntreprise[$numEntreprise] -> addStage($stage);

    			//Persister les objets modifiés (Stages et Entreprise)
    			$manager->persist($stage);
    			$manager->persist($tabEntreprise[$numEntreprise]);
    		}
    	}

        //Envoie des données dans la base de donnée
        $manager->flush();
    }
}
