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
     * @var Line
     *
     * @ORM\ManyToOne(targetEntity="Line", inversedBy="trips")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id")
     */
    private $line;

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
     * Set line
     *
     * @param \AppBundle\Entity\Line $line
     *
     * @return Trip
     */
    public function setLine(\AppBundle\Entity\Line $line = null)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get line
     *
     * @return \AppBundle\Entity\Line
     */
    public function getLine()
    {
        return $this->line;
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
