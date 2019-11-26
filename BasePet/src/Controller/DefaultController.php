<?php 

namespace App\Controller; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController {

    public function index ():Response {

        return $this->render('home.html.twig'); 
    }

    public function userNumber (Request $req) {

        if ($req->isXMLHttpRequest()) {
            $id = $req->get('idusers');
        }
    }
}