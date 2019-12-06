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
    //
    public function amountUser() {
        return $this->createQueryBuilder('b')
        ->select('u.iduser,
         COUNT(b.amount) as sumAmount,
         MONTH(b.datebilling) AS amountMonth,
         DAY(b.datebilling) AS amountDay')
        ->innerJoin(User::class, 'u', 'WITH', 'b.userIduser = u.iduser')
        ->groupBy('amountMonth')
        ->addGroupBy('amountDay')
        ->getQuery()
        ->getResult();
    }

    /**
     * The total amount paid by all users.
     */
    public function totalAmntPaidAllUser() {
        return $this->createQueryBuilder('b')
        ->select('SUM(b.amount) as totalAmnt')
        ->innerJoin(User::class, 'u', 'WITH', 'b.userIduser = u.iduser')
        ->getQuery()
        ->getResult();
    } 

    
}