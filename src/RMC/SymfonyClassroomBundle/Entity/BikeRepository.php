<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 04/12/14
 * Time: 19:37
 */

namespace RMC\SymfonyClassroomBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BikeRepository extends EntityRepository
{



    public function findBikeByType($type)
    {

        $query = $this -> getEntityManager()->createQuery(
            "SELECT b, bt FROM RMCSymfonyClassroomBundle:Bike b
            JOIN b.bikeType bt
            WHERE bt.bike_type_name = :type"
        ) -> setParameter('type', $type);


        return $query -> getResult();
    }






} 