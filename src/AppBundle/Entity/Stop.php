<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stop
 * @ORM\Table(name="Stop")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\StopRepository")
 */
class Stop
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
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
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StopGroup", mappedBy="stop")
     */
    private $stopGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopGroups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Stop
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Stop
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     *
     * @return Stop
     */
    public function addStopGroup(\AppBundle\Entity\StopGroup $stopGroup)
    {
        $this->stopGroups[] = $stopGroup;

        return $this;
    }

    /**
     * Remove stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     */
    public function removeStopGroup(\AppBundle\Entity\StopGroup $stopGroup)
    {
        $this->stopGroups->removeElement($stopGroup);
    }

    /**
     * Get stopGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStopGroups()
    {
        return $this->stopGroups;
    }
}
