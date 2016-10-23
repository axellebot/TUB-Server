<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StopGroup
 *
 * @ORM\Table(name="Trip_has_Stop")
 * @ORM\Entity
 */
class StopGroup
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
     * @var Trip
     *
     * @ORM\OneToOne(targetEntity="Trip", inversedBy="stopGroup")
     * @ORM\JoinColumn(name="trip_id", referencedColumnName="id")
     */
    private $trip;


    /**
     * @var Stop
     *
     * @ORM\ManyToOne(targetEntity="Stop", inversedBy="stopGroups")
     * @ORM\JoinColumn(name="stop_id", referencedColumnName="id")
     */
    private $stop;

    /**
     * @var integer
     * @ORM\Column(name="order",type="integer")
     */
    private $order;

    /**
     * @var Schedule
     *
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="stopGroup")
     */
    private $schedule;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schedule = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set order
     *
     * @param integer $order
     *
     * @return StopGroup
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set trip
     *
     * @param \AppBundle\Entity\Trip $trip
     *
     * @return StopGroup
     */
    public function setTrip(\AppBundle\Entity\Trip $trip = null)
    {
        $this->trip = $trip;

        return $this;
    }

    /**
     * Get trip
     *
     * @return \AppBundle\Entity\Trip
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * Set stop
     *
     * @param \AppBundle\Entity\Stop $stop
     *
     * @return StopGroup
     */
    public function setStop(\AppBundle\Entity\Stop $stop = null)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return \AppBundle\Entity\Stop
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Add schedule
     *
     * @param \AppBundle\Entity\Schedule $schedule
     *
     * @return StopGroup
     */
    public function addSchedule(\AppBundle\Entity\Schedule $schedule)
    {
        $this->schedule[] = $schedule;

        return $this;
    }

    /**
     * Remove schedule
     *
     * @param \AppBundle\Entity\Schedule $schedule
     */
    public function removeSchedule(\AppBundle\Entity\Schedule $schedule)
    {
        $this->schedule->removeElement($schedule);
    }

    /**
     * Get schedule
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}
