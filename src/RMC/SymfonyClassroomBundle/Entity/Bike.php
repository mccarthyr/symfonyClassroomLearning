<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 14/11/14
 * Time: 11:52
 */

namespace RMC\SymfonyClassroomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Bike
 * @package RMC\SymfonyClassroomBundle\Entity
 *
 * @ORM\Entity(repositoryClass="RMC\SymfonyClassroomBundle\Entity\BikeRepository")
 * @ORM\Table(name="bike")
 */
class Bike
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
    protected $name;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;


    /**
     * @ORM\ManyToOne(targetEntity="Groupset", inversedBy="bikes")
     * @ORM\JoinColumn(name="groupset_id", referencedColumnName="id")
     */
    protected $groupSet;

    /**
     * @ORM\ManyToOne(targetEntity="BikeType", inversedBy="bikes")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $bikeType;

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
     * Set name
     *
     * @param string $name
     * @return Bike
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Bike
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bike
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set groupSet
     *
     * @param \RMC\SymfonyClassroomBundle\Entity\Groupset $groupSet
     * @return Bike
     */
    public function setGroupSet(\RMC\SymfonyClassroomBundle\Entity\Groupset $groupSet = null)
    {
        $this->groupSet = $groupSet;

        return $this;
    }

    /**
     * Get groupSet
     *
     * @return \RMC\SymfonyClassroomBundle\Entity\Groupset 
     */
    public function getGroupSet()
    {
        return $this->groupSet;
    }

    /**
     * Set bikeType
     *
     * @param \RMC\SymfonyClassroomBundle\Entity\BikeType $bikeType
     * @return Bike
     */
    public function setBikeType(\RMC\SymfonyClassroomBundle\Entity\BikeType $bikeType = null)
    {
        $this->bikeType = $bikeType;

        return $this;
    }

    /**
     * Get bikeType
     *
     * @return \RMC\SymfonyClassroomBundle\Entity\BikeType 
     */
    public function getBikeType()
    {
        return $this->bikeType;
    }
}
