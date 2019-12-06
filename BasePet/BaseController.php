<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BaseController extends AbstractController{

    public function responseApi($data, int $statuscode=200):Response{
        $retourData = json_encode($data);
        return new Response($retourData, $statuscode, ['Content-Type'=> 'application/json']);
    }
}