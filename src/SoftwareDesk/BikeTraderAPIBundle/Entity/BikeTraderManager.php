<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 1/20/15
 * Time: 10:12 PM
 */

namespace SoftwareDesk\BikeTraderAPIBundle\Entity;

use SoftwareDesk\BikeTraderAPIBundle\Model\BikeTraderManager as BaseBikeTraderManager;

//use Doctrine\ORM\EntityRepository;
//use Doctrine\ORM\EntityManager;
//use SoftwareDesk\BikeTraderAPIBundle\Entity\BikeTraderRepository;
use SoftwareDesk\BikeTraderAPIBundle\Entity\BikeTraderRepositoryInterface;

/*
NEXT STEPS:
1  - Generate the Entities           (DONE)
2  - Set up Tables in DB             (DONE)
3  - Add some test values to them.   (DONE)
4  - Set up Custom Repository        (DONE)
5  - Hook up the code                (DONE)
6  - Review design.                  (DONE)
7  - Put in Repository Interface     (DONE)
8  - Remove ORM Dependency           (DONE)
9  - Review Manager Registry         (DONE)
10  - Write Test Case                (DONE)
11 - Read up Doctrine Fixtures       (DONE)
*/
/*
NEXT STEPS: WEEK STARTING 26TH JANUARY
1  - Unit Tests                                                (DONE)
2  - Functional Tests                                          (DONE)
3  - Fixtures
4  - MongoDB
5  - Set up other REST methods
6  - Put in Manager Registry design code
7  - Set up Tests (unit & functional)
8  - Documentation bundle
9  - Build as its own bundle
10 - Setup on Github and Packagelist
11 - Write up some notes on previous works (REST , GIT, etc)
*/

class BikeTraderManager extends BaseBikeTraderManager
{

    // private $entityManager;
    private $bikeTraderRepository;

    /*public function __construct( EntityManager $entityManager )
    {
        $this -> entityManager = $entityManager;
    }*/
    /*public function __construct(BikeTraderRepository $bikeTraderRepository)
    {
        $this -> bikeTraderRepository = $bikeTraderRepository;
    }*/
    // ***NOTE*** BY USING THE INTERFACE WE REMOVE THE COUPLING TO DOCTRINE ORM WHICH THE
    // BikeTraderRepository CLASS ABOVE IS TIGHTLY COUPLED TO...
    public function __construct(BikeTraderRepositoryInterface $bikeTraderRepository)
    {
        $this -> bikeTraderRepository = $bikeTraderRepository;
    }

    // *** NOTE: *** This is the one method we will implement for demo purposes...
    // Assuming simple case with retrieval options for now...
    public function retrieveBike( array $retrievalOptions )
    {
        // Example of $retrievalOptions - array('type', $type)
        if ( is_array($retrievalOptions) ) {

            $retrievalMethod =  ucfirst($retrievalOptions[0]);
            $retrievalParam = $retrievalOptions[1];

            // Dynamically call the concrete retrieval method, e.g. findBikeByType()
            $retrievalHandler = 'findBikeBy'.$retrievalMethod;
            return $this -> $retrievalHandler($retrievalParam);

        }
    }

    public function findBikeByType($type)
    {
        echo 'Made it to here!'.PHP_EOL;

        /*$bike = $this -> entityManager -> getRepository('SoftwareDeskBikeTraderAPIBundle:Bicycle')
            -> findBikeByType($type);*/
        $bike = $this -> bikeTraderRepository -> findBikeByType($type);
        return $bike;

    }


    // *** NOTE ***
    // THE USE OF CREATE WILL BRING INTO PLAY THE USE OF A MANAGER REGISTRY TO AVOID
    // BEEN TIED TO A SPECIFIC ENTITY_MANAGER (AS getDoctrine() -> getManager() WILL
    // RETURN THE DEFAULT_ENTITY_MANAGER...
    // http://php-and-symfony.matthiasnoback.nl/2014/05/inject-the-manager-registry-instead-of-the-entity-manager/
    public function createBike()
    {
    }

    public function updateBike()
    {
    }

    public function deleteBike()
    {
    }


} 