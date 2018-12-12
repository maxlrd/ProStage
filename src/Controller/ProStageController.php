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
     * @Route("/entreprise", name="prostage_entreprise")
     */
    public function entreprise()
    {
        return $this->render('pro_stage/entreprise.html.twig');
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
        return $this->render('pro_stage/stage.html.twig',
        ['idRessource' => $id]);
    }
}
