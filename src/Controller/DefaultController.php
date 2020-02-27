<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AccidentsRepository;
use App\Repository\UsagersRepository;

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

    /**
     * @Route("/2", name="home2")
     */
    public function index2(UsagersRepository $usagersRepository)
    {

        $resultStatistiquesAnnees = $usagersRepository->getGravite();

//        dd($resultStatistiquesAnnees);

        return $this->render('default/home2.html.twig', [
            'resultStatistiquesAnnees' => $resultStatistiquesAnnees
        ]);
    }
}
