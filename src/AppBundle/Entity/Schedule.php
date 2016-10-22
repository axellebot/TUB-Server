<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="Schedule")
 * @ORM\Entity
 */
class Schedule
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
     * @var \DateTime
     *
     * @ORM\Column(name="ETA", type="time", nullable=true)
     */
    private $eta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;

    /**
     * @var StopInfo
     *
     * @ORM\ManyToOne(targetEntity="StopInfo", inversedBy="schedules")
     * @ORM\JoinColumn(name="stopInfo_id", referencedColumnName="id")
     */
    private $stopInfo;



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

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Schedule
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
     * Set stopInfo
     *
     * @param \AppBundle\Entity\StopInfo $stopInfo
     *
     * @return Schedule
     */
    public function setStopInfo(\AppBundle\Entity\StopInfo $stopInfo = null)
    {
        $this->stopInfo = $stopInfo;

        return $this;
    }

    /**
     * Get stopInfo
     *
     * @return \AppBundle\Entity\StopInfo
     */
    public function getStopInfo()
    {
        return $this->stopInfo;
    }
}
