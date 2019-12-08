<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PetRepository;
use Symfony\Component\HttpFoundation\Request;

class PetController extends AbstractController{
        
    /**
     * the number of animals per users.
     */
    public function petPerUser(PetRepository $repository) :Response {

        $nbPetByUser = $repository->nbPetPerUser(); 

        return $this->render('animal.html.twig', ['nbPetByUser', $nbPetByUser]);
    }

      /**
     * The number of animals 
     * registered per
     *  month and / or years.
     */
    public function petRegistered (PetRepository $repository) {

        $nbOfPetRegistered = $repository->nbOfPetRegistered();

        return $this->render('animal.html.twig', ['nbOfPetRegistered', $nbOfPetRegistered]);
    }

    public function petAcquired (PetRepository $repository) {

        $nbOfPetAcquired = $repository->nbOfPetAcquired();

        return $this->render('animal.html.twig', ['nbOfPetAcquired', $nbOfPetAcquired]);
   
    }

    /**
     * The number of animals by 
     * city and / or country.
     */

    public function petByCountry (Request $request, PetRepository $repository) {

        $country= $request->query->get('country', 'Frane');
        $nbOfPetByCountry = $repository->nbOfPetByCountry($country);

        return $this->render('animal.html.twig', ['nbOfPetByCountry', $nbOfPetByCountry]);
   
    }

    /**
     * PET By type or race
     */
    public function petByType ( Request $request, PetRepository $repository) {

        $type= $request->query->get('type', 'Chat');
        $race= $request->query->get('race', 'race1');

        $nbPetByType = $repository->nbPetByType($type, $race);  

        return $this->render('animal.html.twig', ['nbPetByType', $nbPetByType]);
   
        //return $this->responseApi(['nbPetByType', $nbPetByType]);
    }

}

