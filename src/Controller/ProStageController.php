<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stages;
use App\Entity\Entreprise;

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
        return $this->render('pro_stage/formations.html.twig');
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
        
        return $this->render('pro_stage/stage.html.twig',
        ['stage' => $stage]);
    }
}
