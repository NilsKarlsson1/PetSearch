<?php

namespace App\Repository;

use App\Entity\Token;
use App\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class TokenRepository extends ServiceEntityRepository {

    
    public function __construct(ManagerRegistry $ManagerRegistry){

        parent::__construct($ManagerRegistry, Token::class);
    }

    /*public function listconnexion ($type = 'Bear') {
        return $this->createQueryBuilder('t')
        ->select('COUNT(t.userIduser)')
        ->innerJoin(User::class, 'u', 'WITH' , 't.userIduser = u.iduser')
        ->andWhere('t.type = :type')
        ->setParameter('t.type', $type)
        ;
    }*/

    /**
     * The number of new connections per day.
     */
    public function numberNewConnexionDay () {
        return $this->createQueryBuilder('t')
        ->select('COUNT(t.userIduser) as nbConnexionDay, 
        t.type, DAY(t.createdat) AS tokenByDay')
        ->andWhere('t.type = :type')
        ->setParameter('type', 'Bearer')
        ->groupBy('tokenByDay')
        ->getQuery()
        ->getResult();
    }
   
}
