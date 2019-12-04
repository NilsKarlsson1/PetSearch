<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController{

    /**
     * @ var UserRepository
     */
    
    public function user(UserRepository $repository):Response
    {
            //la liste des utilisateur
        $listUser= $repository->listAllUser(1);
        
        return $this->render('user.html.twig', ['listuser' => $listUser]);
     }

     /**
      * Le nombre d’utilisateur par ville, commun
      */
     public function sameCountry (UserRepository $repository, Request $request):Response
     {
       $country= $request->query->get('country', 'France');
       $userSameCountry = $repository->userSameCountry($country);

       return $this->render('user.html.twig', ['userSameCountry' => $userSameCountry]);
     }

     public function  numberNewRegister (UserRepository $repository) 
     {
        //$nbUserRegister = $repository->
     }

     /**
      * Le nombre d’utilisateur par sexe.
     */   
     public function numberUserBySexe (UserRepository $repository, Request $request):Response
     {
        $sexe = $request->query->get('sexe', 'Femme');
        $nbUserBySexe = $repository->nombreUsersbySexe($sexe);

        return $this->render('user.html.twig', ['nbUserBySexe' => $nbUserBySexe]);
     }

    /**
     * Les nombre d’utilisateur selon le type de boite mail (gmail, yahoo, ...).
     */
     public function numberUserByMail (UserRepository $repository, Request $request) :Response
     {
         $typeMail = $request->query->get('typeMail', 'yahoo');
         $nbUserByMail = $repository->nombreUsersbyEmailType($typeMail);

        return $this->render('user.html.twig', ['nbUserByMail' => $nbUserByMail ]);
     }
    
    /*
     * nombre d'utilisateur actif
     */
    public function  numberActiveUsers () {

    }
    
}