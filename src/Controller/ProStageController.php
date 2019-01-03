<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stages;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index()
    {
        //Récupérer le repository de l'entité Stages
        $repositoryStages = $this->getDoctrine()->getRepository(Stages::class);

        //Récupérer les stages enregistrés en bd
        $stages = $repositoryStages->findAll();

        //Envoyer les stages récupérés à la vue permettant de les afficher
        return $this->render('pro_stage/index.html.twig', ['stages' => $stages]);
    }

    /**
     * @Route("/entreprise/{id}", name="prostage_entreprise")
     */
    public function entreprise($id)
    {
        //Récupérer le repository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises enregistrés en bd par id
        $entreprise = $repositoryEntreprise->find($id);

        return $this->render('pro_stage/entreprise.html.twig', ['entreprise' => $entreprise]);
    }

    /**
     * @Route("/formations", name="prostage_formations")
     */
    public function formations()
    {
        //Récupérer le repository de l'entité Formation
        $repositoryFormations = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les formations enregistrés en bd
        $formations = $repositoryFormations->findAll();

        return $this->render('pro_stage/formations.html.twig', ['formations' => $formations]);
    }

    /**
     * @Route("/stages/{id}", name="prostage_stages")
     */
    public function stages($id)
    {
        //Récupérer le repository de l'entité Stages
        $repositoryStages = $this->getDoctrine()->getRepository(Stages::class);

        //Récupérer les stages enregistrés en bd par id
        $stage = $repositoryStages->find($id);
        
        return $this->render('pro_stage/stage.html.twig', ['stage' => $stage]);
    }

    /**
     * @Route("/stages", name="prostage_allStages")
     */
    public function allStages()
    {
        //Récupérer le repository de l'entité Stages
        $repositoryStages = $this->getDoctrine()->getRepository(Stages::class);

        //Récupérer les stages enregistrés en bd
        $stages = $repositoryStages->findAll();

        return $this->render('pro_stage/allStages.html.twig', ['stages' => $stages]);
    }

    /**
     * @Route("/entreprise", name="prostage_allEntreprises")
     */
    public function allEntreprises()
    {
        //Récupérer le repository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises enregistrés en bd
        $entreprises = $repositoryEntreprise->findAll();

        return $this->render('pro_stage/allEntreprises.html.twig', ['entreprises' => $entreprises]);
    }
}
