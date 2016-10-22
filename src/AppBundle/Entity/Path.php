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
     * @ORM\ManyToOne(targetEntity="Stop")
     * @ORM\JoinColumn(name="departure_stop_id", referencedColumnName="id")
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity="Stop")
     * @ORM\JoinColumn(name="arrival_stop_id", referencedColumnName="id")
     */
    private $arrival;


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

    /**
     * Set departure
     *
     * @param \AppBundle\Entity\Stop $departure
     *
     * @return Path
     */
    public function setDeparture(\AppBundle\Entity\Stop $departure = null)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return \AppBundle\Entity\Stop
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param \AppBundle\Entity\Stop $arrival
     *
     * @return Path
     */
    public function setArrival(\AppBundle\Entity\Stop $arrival = null)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return \AppBundle\Entity\Stop
     */
    public function getArrival()
    {
        return $this->arrival;
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
}
