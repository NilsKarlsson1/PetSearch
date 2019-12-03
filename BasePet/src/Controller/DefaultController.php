<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use App\Controller\BaseController;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DefaultController extends BaseController{

    public function index():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('home.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }

    public function contact():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('contact.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }


    public function login():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('login.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }
    public function animal():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('animal.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }
    public function facture():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('facturation.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }
    public function user(EntityManagerInterface $em, $page=1):Response
    {
            //BDD
        $listUser = $em->getRepository(User::class)->createQueryBuilder('u')
        ->getQuery()
        ->getResult();
        return $this->render('user.html.twig', ['listuser' => $listUser]);
     }
}