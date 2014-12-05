<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 04/12/14
 * Time: 19:55
 */

namespace RMC\SymfonyClassroomBundle\Entity;

use RMC\SymfonyClassroomBundle\Model\BikeSaleManager as BaseBikeSaleManager;

use Doctrine\ORM\EntityManager;

class BikeSaleManager extends BaseBikeSaleManager
{

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var EntityRepository
     */
    protected $repository;

    public function __construct(EntityManager $em)
    {

        parent::__construct();

        $this -> em = $em;
        $this -> repository = $em -> getRepository('RMCSymfonyClassroomBundle:Bike');
    }

    public function findBikeByType($type)
    {
        return $this -> repository -> findBikeByType($type);
    }

} 