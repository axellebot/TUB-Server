<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * Path
 *
 * @ORM\Table(name="Path")
 * @ORM\Entity
 */
class Path
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Lane", inversedBy="paths")
     * @ORM\JoinColumn(name="lane_id", referencedColumnName="id")
     */
    private $lane;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=255, nullable=false)
     */
    private $direction;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="StopInfo", mappedBy="path")
     */
    private $stopInfos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopInfos = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Path
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
     * Set direction
     *
     * @param string $direction
     *
     * @return Path
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Path
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Add stopInfo
     *
     * @param \AppBundle\Entity\StopInfo $stopInfo
     *
     * @return Path
     */
    public function addStopInfo(\AppBundle\Entity\StopInfo $stopInfo)
    {
        $this->stopInfos[] = $stopInfo;

        return $this;
    }

    /**
     * Remove stopInfo
     *
     * @param \AppBundle\Entity\StopInfo $stopInfo
     */
    public function removeStopInfo(\AppBundle\Entity\StopInfo $stopInfo)
    {
        $this->stopInfos->removeElement($stopInfo);
    }

    /**
     * Get stopInfos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStopInfos()
    {
        return $this->stopInfos;
    }

    /**
     * Set lane
     *
     * @param \AppBundle\Entity\Lane $lane
     *
     * @return Path
     */
    public function setLane(\AppBundle\Entity\Lane $lane = null)
    {
        $this->lane = $lane;

        return $this;
    }

    /**
     * Get lane
     *
     * @return \AppBundle\Entity\Lane
     */
    public function getLane()
    {
        return $this->lane;
    }
}
