<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Stop
 * @ORM\Table(name="Stop")
 * @ORM\Entity(repositoryClass="BourgMapper\TubBundle\Entity\Repository\StopRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Stop
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     * @Serializer\Expose
     */
    private $label;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     * @Serializer\Expose
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     * @Serializer\Expose
     */
    private $longitude;


    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     * @Serializer\Expose
     */
    private $available;


    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StopGroup", mappedBy="stop",cascade={"remove"})
     */
    private $stopGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopGroups = new ArrayCollection();
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
     * @param string $label
     *
     * @return Stop
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
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
     * @param StopGroup $stopGroup
     *
     * @return Stop
     */
    public function addStopGroup(StopGroup $stopGroup)
    {
        $this->stopGroups[] = $stopGroup;

        return $this;
    }

    /**
     * Remove stopGroup
     *
     * @param StopGroup $stopGroup
     */
    public function removeStopGroup(StopGroup $stopGroup)
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

    /**
     * To String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getId()." - ".$this->getLabel();
    }
}
