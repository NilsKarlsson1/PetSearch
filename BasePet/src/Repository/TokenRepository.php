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

    public function getAllconnexion ($type = 'Bear', $pageId = 1) {
        return $this->createQuery('COUNT(t.idtoken)')
        ->from(Token::class, 't')
        ->innerJoin(User::class, 'u', Expr\Join::WITH , 'userIduser =u.idusers')
        ->where('userIduser = :u.idusers')
        ->andWhere('t.type = :type')
        ->setParameter('t.type', $type)
        ;
    }

}
