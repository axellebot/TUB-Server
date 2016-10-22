<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stop
 *
 * @ORM\Table(name="Stop")
 * @ORM\Entity
 */
class Stop
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="coordinates", type="string", length=255, nullable=true)
     */
    private $coordinates;


    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="StopInfo", mappedBy="stop")
     */
    private $stopInfos;

    /**
     * @ORM\ManyToMany(targetEntity="Lane")
     * @ORM\JoinTable(name="stops_lanes",
     *      joinColumns={@ORM\JoinColumn(name="stop_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lane_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $lanes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopInfos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lanes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Stop
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
     * Set coordinates
     *
     * @param string $coordinates
     *
     * @return Stop
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return string
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Stop
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
     * @return Stop
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
     * Add lane
     *
     * @param \AppBundle\Entity\Lane $lane
     *
     * @return Stop
     */
    public function addLane(\AppBundle\Entity\Lane $lane)
    {
        $this->lanes[] = $lane;

        return $this;
    }

    /**
     * Remove lane
     *
     * @param \AppBundle\Entity\Lane $lane
     */
    public function removeLane(\AppBundle\Entity\Lane $lane)
    {
        $this->lanes->removeElement($lane);
    }

    /**
     * Get lanes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanes()
    {
        return $this->lanes;
    }
}
