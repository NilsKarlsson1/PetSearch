<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Billing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    //All user
    public function listAllUser($pageId=0)
    {
        return $this->createQueryBuilder('u')
            ->setFirstResult($pageId)
            ->orderBy('u.iduser', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    //les users dans la meme ville 
    public function userSameCountry($city,  $pageId = 1) {
        return $this->createQueryBuilder('COUNT(u.email)')
        ->from(User::class, 'u')
        ->where('u.city= :u.city')
        ->setParameter('u.city', $city)
        ->setFirstResult($pageId)
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
    }

    // nouveau inscrit 
    public function newUserRegister ($pageId) {
        return $this->createQueryBuilder('COUNT(u.iduser)')
        ->from(User::class, 'u')
        ->where('CURRENT_DATE() >= u.createdat')
        ->setFirstResult($pageId)
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
        ;
    }

    //le nombre utilisateur par sexe 
    public function nombreUsersbySexe ($sexe = 'Femme', $pageId = 1) {
        return $this->createQueryBuilder('COUNT(u.iduser) as nombreUserBySexe')
        ->andWhere('u.sexe = :sexe')
        ->setParameter('sexe', $sexe)
        ->orderBy('u.firstname', 'ASC')
        ->setFirstResult($pageId) //debut pagination
        ->setMaxResults(10) // envoi 10 elem
        ->getQuery()
        ->getResult();
    }

    // nombre utilisateur selon le type de boite mail
    public function nombreUsersbyEmailType($typeMail) {
        return $this->createQueryBuilder('COUNT(u.iduser) as nomberUserMailType')
        ->from(User::class, 'u')
        ->where('u.email LIKE :typeMail')
        ->setParameter( 'typeMail', '%'.$typeMail.'%')
        ->getQuery()
        ->getResult()
        ;

    }

  
}