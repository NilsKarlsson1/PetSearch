<?php

namespace App\Repository;

use App\Entity\Pet;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PetRepository extends ServiceEntityRepository {

   public function __construct(ManagerRegistry $ManagerRegistry)
   {

        parent:: __construct($ManagerRegistry, Pet::class);
    } 

}