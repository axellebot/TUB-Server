<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ScheduleGroup
 *
 * @ORM\Table(name="join_schedule_period_jls")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\AccessorOrder("custom", custom = {"id","order", "ScheduleId","PeriodId" ,"StopGroupId"})
 */
class ScheduleGroup
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
     * @var Schedule
     *
     * @ORM\OneToOne(targetEntity="Schedule")
     * @ORM\JoinColumn(name="schedule_id", referencedColumnName="id")
     */
    private $schedule;

    /**
     * @var Period
     *
     * @ORM\ManyToOne(targetEntity="Period", inversedBy="scheduleGroups")
     * @ORM\JoinColumn(name="period_id", referencedColumnName="id")
     */
    private $period;

    /**
     * @var integer
     * @ORM\Column(name="order",type="integer")
     * @Serializer\Expose
     */
    private $order;

    /**
     * @var StopGroup
     *
     * @ORM\ManyToOne(targetEntity="StopGroup", inversedBy="scheduleGroups")
     * @ORM\JoinColumn(name="jls_id", referencedColumnName="id")
     */
    private $stopGroup;


    //Custom Functions
    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("schedule_id")
     */
    public function getScheduleId()
    {
        return $this->getSchedule()->getId();
    }

    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("period_id")
     */
    public function getPeriodId()
    {
        return $this->getPeriod()->getId();
    }

    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("stop_group_id")
     */
    public function getStopGroupId()
    {
        return $this->getStopGroup()->getId();
    }

    //Generated Functions

    /**
     * Get schedule
     *
     * @return Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set schedule
     *
     * @param Schedule $schedule
     *
     * @return ScheduleGroup
     */
    public function setSchedule(Schedule $schedule = null)
    {
        $this->schedule = $schedule;

        return $this;
    }


    /**
     * Get period
     *
     * @return Period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set period
     *
     * @param Period $period
     *
     * @return ScheduleGroup
     */
    public function setPeriod(Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get stopGroup
     *
     * @return StopGroup
     */
    public function getStopGroup()
    {
        return $this->stopGroup;
    }

    /**
     * Set stopGroup
     *
     * @param StopGroup $stopGroup
     *
     * @return ScheduleGroup
     */
    public function setStopGroup(StopGroup $stopGroup = null)
    {
        $this->stopGroup = $stopGroup;

        return $this;
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
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
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
}
