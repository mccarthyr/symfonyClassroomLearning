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
/*

    IN REALITY THE BIKE SALE MANAGER IS EVER ONLY GOING TO NEED TO GET THE BIKE CLASS AS
    THAT IS THE ONE THAT SALES ARE ABOUT AND IT IS THE ONE CONNECTED WITH THE NECESSARY REPOSITORY...

    SO CAN INJECT ' BikeRepository ' DIRECTLY INTO THIS FOR OUR USE...

    BUT USE A REPOSITORY INTERFACE FOR THE INJECTION...
    As my custom repostiry extends the EntityRepository, that means it is
    coupled to the Doctrine ORM, so if wanted to replace my custom repository
    with one that extends from MongoDB for example...

    Solution: (SOLID Design Principle)
    Dependency Inversion Principle -
    It tells us that we should depend on abstractions, not on concretions.
    So, injection in an interface rather than a concrete class...
*/


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