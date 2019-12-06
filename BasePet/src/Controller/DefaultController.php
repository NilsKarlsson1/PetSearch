<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use App\Controller\BaseController;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController {

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
  /*  public function user(EntityManagerInterface $em):Response
    {
            //BDD
        $listUser = $em->getRepository(User::class)
        ->createQueryBuilder('u')
        ->select('count(u.email) as mailType, u.iduser, u.lastname, u.firstname, u.city')
        ->getQuery()
        ->getResult();

        return $this->render('user.html.twig', ['listuser' => $listUser]);
     }*/
       

    public function error():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('error.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }
}