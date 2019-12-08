<?php

namespace App\Controller;


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
        $listUser= $repository->listAllUser();
        
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
         $nbUserByMail = $repository->numbreUsersbyEmailType($typeMail);

        return $this->render('user.html.twig', ['nbUserByMail' => $nbUserByMail ]);
     }
    
    /*
     * nombre d'utilisateur actif
     */
    public function  numberActiveUsers (UserRepository $repository, Request $request) :Response
    {
        $statut = $request->query->get('statut', 1);
        $nbUserActif = $repository->numberOfActiveUsers($statut);

        return $this->render('user.html.twig', ['nbUserActif' => $nbUserActif ]);
    }
    
    /**
     * Les nombre d’utilisateur selon leur tranche d'age
     * a revoir
     */
    public function numberByUserAge (UserRepository $repository, Request $request) :Response 
    {
        //$age = $request->query->get('age', 18);
        //$age2= $request->query->get('age2', 25);
        $nbUserByAge = $repository->numberUserAge();

    return $this->render('user.html.twig', ['nbUserByAge' => $nbUserByAge ]);
    
    }

   

}