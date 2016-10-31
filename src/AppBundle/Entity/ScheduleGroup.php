<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScheduleGroup
 *
 * @ORM\Table(name="join_schedule_period_jts")
 * @ORM\Entity
 */
class ScheduleGroup
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
     * @var Schedule
     *
     * @ORM\OneToOne(targetEntity="Schedule")
     * @ORM\JoinColumn(name="schedule_id", referencedColumnName="id")
     */
    private $schedule;

    /**
     * @var Period
     *
     * @ORM\OneToOne(targetEntity="Period")
     * @ORM\JoinColumn(name="period_id", referencedColumnName="id")
     */
    private $period;

    /**
     * @var integer
     * @ORM\Column(name="order",type="integer")
     */
    private $order;

    /**
     * @var StopGroup
     *
     * @ORM\ManyToOne(targetEntity="StopGroup", inversedBy="scheduleGroups")
     * @ORM\JoinColumn(name="jts_id", referencedColumnName="id")
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
     * Set order
     *
     * @param integer $order
     *
     * @return ScheduleGroup
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
     * Set schedule
     *
     * @param \AppBundle\Entity\Schedule $schedule
     *
     * @return ScheduleGroup
     */
    public function setSchedule(\AppBundle\Entity\Schedule $schedule = null)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \AppBundle\Entity\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set period
     *
     * @param \AppBundle\Entity\Period $period
     *
     * @return ScheduleGroup
     */
    public function setPeriod(\AppBundle\Entity\Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \AppBundle\Entity\Period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     *
     * @return ScheduleGroup
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
