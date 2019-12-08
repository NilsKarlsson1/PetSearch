<?php

namespace App\Controller;

use App\Repository\BillingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BillingController extends AbstractController {
    

    public function facture (BillingRepository $repository):Response
    {

        $allAmountByUser = $repository->amountUser();

        return $this->render('facturation.html.twig', ['allAmountByUser' => $allAmountByUser]);
    
    }

    /**
     * The total amount paid by all users.
     */
    public function totalAmntPaidAll (BillingRepository $repository) {

        $totalAmntPaidAll = $repository->totalAmntPaidAllUser();

        return $this->render('facturation.html.twig', ['totalAmntPaidAll', $totalAmntPaidAll]);
    }

     /**
     * The number of subscriptions per active and / or inactive user.
     */
    public function numberSubscriptions (BillingRepository $repository, Request $request) {

        $statut = $request->query->get('statut', 'false');
        $numbOfSubscription = $repository->numbOfSubscription($statut);
        
        return  $this->render('user.html.twig', ['numbOfSubscription' => $numbOfSubscription ]);
        //return $this->responseApi(['numbOfSubscription', $numbOfSubscription]);
    }
}