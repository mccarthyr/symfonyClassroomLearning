<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 04/12/14
 * Time: 17:26
 */

namespace RMC\SymfonyClassroomBundle\Model;

/**
 * Interface BikeSaleManagerInterface
 * @package RMC\SymfonyClassroomBundle\Model
 *
 * Interface to be implemented by Bike Sale Managers. This add an addition
 * level of abstraction between your application and the actual repository.
 */
interface BikeSaleManagerInterface
{

    public function findBikeByType($type);

    //public function findBikeByMinimumPrice($minimumPrice);

    //public function findBikeByMaximumPrice($maximumPrice);

    /*
     * Additional feature like create and save can be added for
     * the Bike Sale Manager but just keeping to a basic
     * version for now.
     */

} 