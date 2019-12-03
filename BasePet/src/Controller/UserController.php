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
            //BDD
        //$repository = $em->getRepository(User::class);
        $listUser= $repository->listAllUser(1);
        /*->createQueryBuilder('u')
        ->select('count(u.email) as mailType, u.iduser, u.lastname, u.firstname, u.city')
        ->getQuery()
        ->getResult();*/

        return $this->render('user.html.twig', ['listuser' => $listUser]);
     }
    
}