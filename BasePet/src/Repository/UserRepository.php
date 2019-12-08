<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    //All user
    public function listAllUser()

    {
        return $this->createQueryBuilder('u')
        ->select('u.iduser, u.firstname, u.lastname, u.city')
        ->orderBy('u.iduser')
        ->getQuery()
        ->getResult()
        ;
    }


    //le nombre d'utilisateur par ville commun 
    public function userSameCountry($country) {
        return $this->createQueryBuilder('u')
        ->select('COUNT(u.email) as numberUserByCountry, u.country')
        ->andWhere('u.country= :country')
        ->setParameter('country', $country)
        ->getQuery()
        ->getResult();
    }

    // nouveau inscrit 
    public function newUserRegister () {
        return $this->createQueryBuilder('COUNT(u.iduser)')
        ->select('COUNT(u.iduser), u.createdat')
        ->where('CURRENT_DATE() >= u.createdat')
        ->setParameter('','')
        ->getQuery()
        ->getResult();
        ;
    }

    //le nombre utilisateur par sexe 
    public function nombreUsersbySexe ($sexe = 'Femme') {
        return $this->createQueryBuilder('u')
        ->select('COUNT(u.iduser) as nombreUserBySexe, u.sexe')
        ->andWhere('u.sexe = :sexe')
        ->setParameter('sexe', $sexe)
        ->getQuery()
        ->getResult();
    }

    // nombre utilisateur selon le type de boite mail
    public function numbreUsersbyEmailType($typeMail) {
        return $this->createQueryBuilder('u')
        ->select('COUNT(u.email) as nomberUserMailType')
        ->andWhere('u.email LIKE :typeMail')
        ->setParameter( 'typeMail', '%'.$typeMail.'%')
        ->getQuery()
        ->getResult();
    }

    /*
     * nombre d'utilisateur actif
     */
    public function numberOfActiveUsers ($statut) {
        return $this->createQueryBuilder('u')
        ->select('COUNT(u.iduser) as activeUser, u.active')
        ->andWhere('u.active = :statut')
        ->setParameter('statut', $statut)
        ->getQuery()
        ->getResult();
    }

    /**
     * a revoir
     */
    public function numberUserAge():array
    {
        return $this->createQueryBuilder('u')
        ->select('DATE_DIFF( CURRENT_DATE(), u.birthday ) as age')
        ->groupBy('u.iduser')
        ->getQuery()
        ->getResult();
        
    }

// ->select('COUNT(u.iduser) as nbUserAge, DATE_DIFF( CURRENT_DATE(), u.birthday ) as age')
       

}