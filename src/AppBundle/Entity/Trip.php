<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trip
 *
 * @ORM\Table(name="Trip")
 * @ORM\Entity
 */
class Trip
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
     * @var Lane
     *
     * @ORM\ManyToOne(targetEntity="Lane", inversedBy="trips")
     * @ORM\JoinColumn(name="lane_id", referencedColumnName="id")
     */
    private $lane;

    /**
     * @var StopGroup
     *
     * @ORM\OneToOne(targetEntity="StopGroup", mappedBy="trip")
     */
    private $stopGroup;

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
     * Set lane
     *
     * @param \AppBundle\Entity\Lane $lane
     *
     * @return Trip
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
     * Set stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     *
     * @return Trip
     */
    public function setStopGroup(\AppBundle\Entity\StopGroup $stopGroup = null)
    {
        $this->stopGroup = $stopGroup;

        return $this;
    }

    /**
     * Get stopGroup
     *
     * @return \AppBundle\Entity\StopGroup
     */
    public function getStopGroup()
    {
        return $this->stopGroup;
    }
}
