<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 04/12/14
 * Time: 17:16
 */

namespace RMC\SymfonyClassroomBundle\Model;

/**
 * Class BikeSaleManager
 * @package RMC\SymfonyClassroomBundle\Model
 *
 * Abstract Bike Sale Manager implementation which can be used as a
 * base class for your concrete manager.
 */
abstract class BikeSaleManager implements BikeSaleManagerInterface
{

    public function __construct() {

    }

    // *** NOTE: ***
    // DISPATCHING OF EVENTS CODE COULD BE DONE FROM HERE TO HAVE IT ALREADY
    // IMPLEMENTED AS A FEATURE OF THE SYSTEM...see comment bundle for example.

    public function findBikeByType($type)
    {
        if ( is_string($type) ) {
//            return $this -> findBikeByType($type);
        }
    }

/*
    public function findBikeByMinimumPrice($minimumPrice)
    {
        if ( is_int($minimumPrice) ) {
            return $this -> findBikeByMinimumPrice($minimumPrice);
        }
    }

    public function findBikeByMaximumPrice($maximumPrice)
    {
        if ( is_int($maximumPrice) ) {
            return $this -> findBikeByMaximumPrice($maximumPrice);
        }
    }
*/

} 