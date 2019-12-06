<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UserController extends AbstractController{

    /**
     * @ var UserRepository
     */
    
    public function user(EntityManagerInterface $em, UserRepository $repository):Response
    {
            
        $listUser= $repository->listAllUser(0);
        

        return $this->render('user.html.twig', ['listuser' => $listUser]);
     }
    
}