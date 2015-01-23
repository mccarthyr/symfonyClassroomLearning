<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 1/22/15
 * Time: 7:46 PM
 */

namespace SoftwareDesk\BikeTraderAPIBundle\Entity;

use Doctrine\ORM\EntityRepository;
use SoftwareDesk\BikeTraderAPIBundle\Entity\BikeTraderRepositoryInterface;

/**
 * Class DoctrineORMBikeTraderRepository
 * @package SoftwareDesk\BikeTraderAPIBundle\Entity
 *
 * This class is specifically coupled with the Doctrine ORM.
 * It implements the persistence storage agnostic interface of
 * BikeTraderRepositoryInterface which is injected into the
 * BikeTraderManager.
 */
class DoctrineORMBikeTraderRepository extends EntityRepository implements BikeTraderRepositoryInterface
{

    public function findBikeByType($type)
    {

        echo 'NOW MADE IT TO THE CUSTOM REPOSITORY!'.PHP_EOL;

        $bike = $this -> getEntityManager() -> getRepository('SoftwareDeskBikeTraderAPIBundle:Bicycle')
            -> findBy(array('type' => $type));
        return $bike;
    }




}


