<?php

namespace App\Repository;

use App\Entity\Pet;
use App\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PetRepository extends ServiceEntityRepository {

   public function __construct(ManagerRegistry $ManagerRegistry)
   {

        parent:: __construct($ManagerRegistry, Pet::class);
    } 

    /**
     * the number of animals per users.
     */
    public function nbPetPerUser () {
        return $this->createQueryBuilder('p')  
        ->select('Count(p.idpet) as numberPet')
        ->innerJoin(User::class, 'u', 'WITH' , 'p.userIduser =u.iduser')
        ->groupBy('p.userIduser')
        ->getQuery()
        ->getResult();
    }

    /**
     * The number of animals 
     * registered per
     *  month and / or years.
     */

    public function nbOfPetRegistered () {
        return $this->createQueryBuilder('p')
        ->select('Count(p.idpet) as numberPet,
        MONTH(p.createdat) AS petRegistMonth,
        YEAR(p.createdat) AS petRegistYear')
        ->groupBy('petRegistMonth')
        ->addGroupBy('petRegistYear')
        ->getQuery()
        ->getResult();
    }

    /**
     * The number of animals acquired
     *  per month and / or years.
     */
    public function nbOfPetAcquired () {
        return $this->createQueryBuilder('p')
        ->select('Count(p.idpet) as numberPet,
        MONTH(p.dateacquisition) AS petAcquiredMonth,
        YEAR(p.dateacquisition) AS petAcquiredYear')
        ->groupBy('petAcquiredMonth')
        ->addGroupBy('petAcquiredYear')
        ->getQuery()
        ->getResult();
    }

    /**
     * The number of animals by 
     * city and / or country.
     */

    public function nbOfPetByCountry ($country) {
        return $this->createQueryBuilder('p') 
        ->select('Count(p.idpet) as numnberPet, 
        u.country, u.city')
        ->innerJoin(User::class, 'u', 'WITH', 'p.userIduser = u.iduser')
        ->andWhere('u.country = :country')
        ->setParameter('country', $country)
        ->groupBy('u.iduser')
        ->getQuery()
        ->getResult();
    }

    /**
     * Pet by type or race
     */

    public function nbPetByType ($type, $race) {
        return $this->createQueryBuilder('p') 
        ->select('count(p.idpet) as numeberPet,
        p.type, p.race')
        ->where('p.type = :type')
        ->setParameter('type', $type)
        ->andWhere('p.race = :race')
        ->setParameter('race', $race)
        ->groupBy('p.type')
        ->addGroupBy('p.race')
        ->getQuery()
        ->getResult();
    }


    public function test () {
        return $this->createQueryBuilder('') 
        ->getQuery()
        ->getResult();
    }

}