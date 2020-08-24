<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LayoutController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('layout/index.html.twig', [
            'controller_name' => 'layoutController',
        ]);
    }

    /**
     * @Route("/agenda", name="agenda")
     */
    public function agenda()
    {
        return $this->render('layout/agenda.html.twig');
    }

    /**
     * @Route("/parametre", name="parametre")
     */
    public function parametre()
    {
        return $this->render('layout/parametre.html.twig');
    }

    /**
     * @Route("/fiches_de_paie", name="fiches_de_paie")
     */
    public function fiches_de_paie()
    {
        return $this->render('layout/fiches_de_paie.html.twig');
    }

    /**
     * @Route("/gestion", name="gestion")
     */
    public function gestion()
    {
        return $this->render('layout/gestion.html.twig');
    }

    /**
     * @Route("/reunions", name="reunions")
     */
    public function reunions()
    {
        return $this->render('layout/reunions.html.twig');
    }


    /**
     * @Route("/consultations_chantier", name="consultations_chantier")
     */
    public function consultations_chantier()
    {
        return $this->render('layout/consultations_chantier.html.twig');
    }
}
