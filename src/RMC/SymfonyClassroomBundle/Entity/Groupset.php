<?php
/**
 * Created by PhpStorm.
 * User: richardmccarthy
 * Date: 03/12/14
 * Time: 17:46
 */

namespace RMC\SymfonyClassroomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Class Groupset
 * @package RMC\SymfonyClassroomBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="groupset")
 */
class Groupset
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $groupset_name;

    /**
     * @ORM\OneToMany(targetEntity="Bike", mappedBy="groupSet")
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
     * Set groupset_name
     *
     * @param string $groupsetName
     * @return Groupset
     */
    public function setGroupsetName($groupsetName)
    {
        $this->groupset_name = $groupsetName;

        return $this;
    }

    /**
     * Get groupset_name
     *
     * @return string 
     */
    public function getGroupsetName()
    {
        return $this->groupset_name;
    }

    /**
     * Add bikes
     *
     * @param \RMC\SymfonyClassroomBundle\Entity\Bike $bikes
     * @return Groupset
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
