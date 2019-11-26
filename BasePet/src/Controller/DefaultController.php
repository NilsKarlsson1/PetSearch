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
}