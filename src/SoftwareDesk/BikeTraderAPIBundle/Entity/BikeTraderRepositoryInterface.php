<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 1/22/15
 * Time: 7:38 PM
 */

namespace SoftwareDesk\BikeTraderAPIBundle\Entity;


interface BikeTraderRepositoryInterface
{
    /**
     * @param $type
     * @return Bicycle[]
     */
    public function findBikeByType($type);
}