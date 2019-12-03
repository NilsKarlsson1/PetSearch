<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BaseController extends AbstractController{
    
    public function responseApiText($data, int $statuscode=200):Response{
        $listdata = []; 
        
        foreach($data as $att) {

            $listdata->push($att);
        }

        return new Response($listdata, $statuscode, ['Content-Type'=> 'application/text']);
        
    }

    public function responseApi($data, int $statuscode=200):Response{
        $retourData = json_encode($data);
        return new Response($retourData, $statuscode, ['Content-Type'=> 'application/json']);
    }
}