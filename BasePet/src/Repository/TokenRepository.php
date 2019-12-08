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

    /**
     * The number of user login per country over a month or year.
     */

    public function nbOfUserloginCountry () {
        return $this->createQueryBuilder('t')
        ->select('Count(t.userIduser) as numberUserLogin,
        YEAR(t.createdat) as userLog')
        ->innerJoin(User::class, 'u', 'WITH' , 't.userIduser =u.iduser')
        ->groupBy('t.userIduser')
        ->addGroupBy('userLog')
        ->getQuery()
        ->getResult();
    }

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

    /**
     * The number of user connections per device.
     */
    public function nbOfUserConnectDevice ($device) {
        return $this->createQueryBuilder('t')
        ->select('count(t.userIduser) as numberUser, t.decive, 
        MONTH(t.createdat) AS tokenByMonth,
        YEAR(t.createdat) AS tokenByYear')
        ->andWhere('t.decive = :device')
        ->setParameter('device', $device)
        ->groupBy('t.decive')
        ->addGroupBy('tokenByYear')
        ->getQuery()
        ->getResult();
    }

    /**
     * The list of the most frequent countries with regard to user tokens.
     */

    public function listOfMostFreqCountry($type) {
        return $this->createQueryBuilder('t')
        ->select('u.country')
        ->innerJoin(User::class, 'u', 'WITH' , 't.userIduser =u.iduser')
        ->andWhere('t.type = :type')
        ->setParameter('type', $type)
        ->groupBy('t.type')
        ->getQuery()
        ->getResult();
    }

    /**
     * The number of reinisialization of passwords by users.
     */
    public function nbPassLostUser () {
        return $this->createQueryBuilder('t')
        ->select('Count(t.userIduser) as numberPassLost, t.type,
        DAY(t.createdat) AS tokenByDay')
        ->where('CURRENT_DATE() >= t.createdat')
        ->andWhere('t.type = :type')
        ->setParameter('type', 'PassLost')
        ->groupBy('t.userIduser')
        ->addGroupBy('tokenByDay ')
        ->getQuery()
        ->getResult();
    }
}
