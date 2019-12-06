<?php

namespace App\Controller;

use App\Repository\BillingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    
}