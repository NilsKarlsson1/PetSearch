<?php

namespace App\Repository;

use App\Entity\Billing;
use App\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class BillingRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $ManagerRegistry)
    {

        parent:: __construct($ManagerRegistry, Billing::class);
    } 

    public function amountUser() {
        return $this->createQueryBuilder('u.firstname, u.lastname, COUNT(b.amount) as sumAmount')
        ->from(Billing::class, 'b')
        ->innerJoin(User::class, 'u', 'WITH', ' b.userIduser = u.idusers')
        ->where('b.userIduser = :u.idusers')
        ->groupBy('YEAR(dateBilling), MONTH(dateBilling)')
        ->getQuery()
        ->getResult();
    }

}