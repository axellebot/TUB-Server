<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StopGroup
 *
 * @ORM\Table(name="join_trip_stop")
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
     * @var ScheduleGroup
     *
     * @ORM\OneToMany(targetEntity="ScheduleGroup", mappedBy="stopGroup")
     */
    private $scheduleGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scheduleGroups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add scheduleGroup
     *
     * @param \AppBundle\Entity\ScheduleGroup $scheduleGroup
     *
     * @return StopGroup
     */
    public function addScheduleGroup(\AppBundle\Entity\ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups[] = $scheduleGroup;

        return $this;
    }

    /**
     * Remove scheduleGroup
     *
     * @param \AppBundle\Entity\ScheduleGroup $scheduleGroup
     */
    public function removeScheduleGroup(\AppBundle\Entity\ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups->removeElement($scheduleGroup);
    }

    /**
     * Get scheduleGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScheduleGroups()
    {
        return $this->scheduleGroups;
    }
}
