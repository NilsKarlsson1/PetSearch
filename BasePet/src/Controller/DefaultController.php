<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController{

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
    public function user():Response
    {
            //BDD
        $users = [
            [ "name" => "Ivan" , "poste" => "j ai"],
            [ "name" => "Sacard" , "poste" => "pas d "],
            [ "name"=>"Havane","poste"=>"inspiration"],
            
        ];



        return $this->render('user.html.twig', [
            'title' => "crash",
            "users" => $users
            ]);
    }


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