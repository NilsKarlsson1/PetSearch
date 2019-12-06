<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TokenRepository;
use Symfony\Component\HttpFoundation\Response;

class TokenController extends AbstractController{

    public function nbConnexionByDay(TokenRepository $repository) :Response {

        $nbConnexionDay = $repository->numberNewConnexionDay();

        return $this->render('user.html.twig', ['nbConnexionDay' => $nbConnexionDay ]);

    }
}