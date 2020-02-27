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
    public function index(AccidentsRepository $accidentsRepository, UsagersRepository $usagersRepository)
    {

        $resultStatistiquesAnnees = $accidentsRepository->getStatistiquesAnnées();
        $resultBlesse = $usagersRepository->getGravite();
        $statSexe = $usagersRepository->getSexe();
        $statTrajet = $usagersRepository->getTypeTrajet();

//        dd($statTrajet);

        return $this->render('default/home.html.twig', [
            'resultStatistiquesAnnees' => $resultStatistiquesAnnees,
            'resultBlesse' => $resultBlesse,
            'statSexe' => $statSexe,
            'statTrajet' => $statTrajet
        ]);
    }


}
