<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index()
    {
        return $this->render('pro_stage/index.html.twig');
    }

    /**
     * @Route("/ressources/{id}", name="prostage_ressource")
     */
    public function afficherRessourcePeda($id)
    {
        return $this->render('pro_stage/affichageRessource.html.twig',
        ['idRessource' => $id]);
    }
}
