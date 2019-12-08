<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TokenRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use App\Controller\BaseController;

class TokenController extends AbstractController{
    

    public function nbConnexionByDay(TokenRepository $repository) :Response {

        $nbConnexionDay = $repository->numberNewConnexionDay();

        return $this->render('user.html.twig', ['nbConnexionDay' => $nbConnexionDay ]);

    }

    /**
     * The number of user connections per device.
     */
    public function userConnectDevice(TokenRepository $repository, Request $request) {

        $device = $request->query->get('device', 'Destop');

        $nbOfUserConnectDevice = $repository->nbOfUserConnectDevice($device);

        return $this->render('user.html.twig', ['nbOfUserConnectDevice' => $nbOfUserConnectDevice ]);
        //return $this->responseApi(['nbOfUserConnectDevice', $nbOfUserConnectDevice]);
    }

    /**
     * The number of user login per country over a month or year.
     */

    public function userloginCountry (TokenRepository $repository) {

        //$loginCountry = $request->query->get('year', '2018');
        $nbOfUserloginCountry = $repository->nbOfUserloginCountry();
        return $this->render('user.html.twig', ['nbOfUserloginCountry' => $nbOfUserloginCountry ]);
        
     
    }

     /**
     * The number of user login per country over a month or year.
     */

    public function tokenListByCountry (TokenRepository $repository, Request $request) {

        $listByCountry = $request->query->get('type', 'PassLost');
        $listOfMostFreqCountry = $repository->listOfMostFreqCountry($listByCountry);
        return $this->render('user.html.twig', ['listOfMostFreqCountry' => $listOfMostFreqCountry ]);
        //return $this->responseApi(['listOfMostFreqCountry', $listOfMostFreqCountry]);
    }

     /**
     * The number of reinisialization of passwords by users.
     */
    public function passLostByUser (TokenRepository $repository) {

        $nbPassLostUser = $repository->nbPassLostUser();

        return $this->render('user.html.twig', ['nbPassLostUser' => $nbPassLostUser ]);
        //return $this->responseApi(['nbPassLostUser' => $nbPassLostUser]);
    }
}