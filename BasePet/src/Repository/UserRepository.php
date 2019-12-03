<?php

namespace App\Repository;


use App\Entity\Users;
use App\Entity\Billing;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $ManagerRegistry){

        parent:: __construct($ManagerRegistry, Users::class);
    } 

    //recup la liste des users
    public function getAllUser () {
        return $this->createQueryBuilder('u')
        ->getQuery()
        ->getResult();
    }

    // getAll users with the same country

    public function AllUserSameCountry($city,  $pageId = 1) {
        return $this->createQueryBuilder('COUNT(u.email)')
        ->from(Users::class, 'u')
        ->where('u.city= :u.city')
        ->setParameter('u.city', $city)
        ->setFirstResults($pageId)
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
    }


    // montant par users
    public function getAllAmountUser() {
        return $this->createQuery('u.firstname, u.lastname, COUNT(b.amount) as sumAmount')
        ->from(Users::class, 'u')
        ->innerJoin(Billing::class, 'b', Expr\Join::WITH, 'u.idusers = userIduser')
        ->where('u.idusers = :userIduser')
        ->groupBy(YEAR(dateBilling), MONTH(dateBilling))
        ->getQuery()
        ->getResult();
    }

    /*nombre de connexion par pays 
    public function nombreConnexion () {
        return $this->createQuery('')
        ->from(Users::class, 'u')
        ->
        ->getQuery()
        ->getResult();
    }*/

}