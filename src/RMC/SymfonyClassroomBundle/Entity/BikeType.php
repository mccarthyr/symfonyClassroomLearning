<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 03/12/14
 * Time: 19:51
 */

namespace RMC\SymfonyClassroomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Class BikeType
 * @package RMC\SymfonyClassroomBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="bikeType")
 */
class BikeType
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $bike_type_name;

    /**
     * @ORM\OneToMany(targetEntity="Bike", mappedBy="bikeType")
     */
    protected $bikes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bikes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bike_type_name
     *
     * @param string $bikeTypeName
     * @return BikeType
     */
    public function setBikeTypeName($bikeTypeName)
    {
        $this->bike_type_name = $bikeTypeName;

        return $this;
    }

    /**
     * Get bike_type_name
     *
     * @return string 
     */
    public function getBikeTypeName()
    {
        return $this->bike_type_name;
    }

    /**
     * Add bikes
     *
     * @param \RMC\SymfonyClassroomBundle\Entity\Bike $bikes
     * @return BikeType
     */
    public function addBike(\RMC\SymfonyClassroomBundle\Entity\Bike $bikes)
    {
        $this->bikes[] = $bikes;

        return $this;
    }

    /**
     * Remove bikes
     *
     * @param \RMC\SymfonyClassroomBundle\Entity\Bike $bikes
     */
    public function removeBike(\RMC\SymfonyClassroomBundle\Entity\Bike $bikes)
    {
        $this->bikes->removeElement($bikes);
    }

    /**
     * Get bikes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBikes()
    {
        return $this->bikes;
    }
}
