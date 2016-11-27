<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Schedule
 *
 * @ORM\Table(name="Schedule")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class Schedule
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
     * @var \DateTime
     *
     * @ORM\Column(name="ETA", type="time", nullable=true)
     * @Serializer\Expose
     */
    private $eta;


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
     * Set eta
     *
     * @param \DateTime $eta
     *
     * @return Schedule
     */
    public function setEta($eta)
    {
        $this->eta = $eta;

        return $this;
    }

    /**
     * Get eta
     *
     * @return \DateTime
     */
    public function getEta()
    {
        return $this->eta;
    }
}
