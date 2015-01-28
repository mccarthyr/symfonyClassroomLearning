<?php

namespace SoftwareDesk\BikeTraderAPIBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use SoftwareDesk\BikeTraderAPIBundle\Entity\BikeTraderRepositoryInterface;

/**
 * DoctrineODMBikeTraderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 * This class is specifically coupled with the Doctrine ORM.
 * It implements the persistence storage agnostic interface of
 * BikeTraderRepositoryInterface which is injected into the
 * BikeTraderManager.
 */
class DoctrineODMBikeTraderRepository extends DocumentRepository implements BikeTraderRepositoryInterface
{

    public function findBikeByType($type)
    {
        echo PHP_EOL.'MADE IT TO THE MONGO DB CUSTOM REPOSITORY'.PHP_EOL;

        $bike = $this -> getDocumentManager() -> getRepository('SoftwareDeskBikeTraderAPIBundle:Bicycle')
                ->findOneBy(array('type' => $type));
        return $bike;
    }
}

