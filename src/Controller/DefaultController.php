<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AccidentsRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AccidentsRepository $accidentsRepository)
    {

        $resultStatistiquesAnnees = $accidentsRepository->getStatistiquesAnnées();

//        dd($resultStatistiquesAnnees);

        return $this->render('default/home.html.twig', [
            'resultStatistiquesAnnees' => $resultStatistiquesAnnees
        ]);
    }
}
