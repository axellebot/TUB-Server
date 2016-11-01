<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScheduleGroup
 *
 * @ORM\Table(name="join_schedule_period_jls")
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
     * @ORM\JoinColumn(name="jls_id", referencedColumnName="id")
     */
    private $stopGroup;
}
