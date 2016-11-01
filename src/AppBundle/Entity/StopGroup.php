<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StopGroup
 *
 * @ORM\Table(name="join_line_stop")
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
     * @var Line
     *
     * @ORM\OneToOne(targetEntity="Line", inversedBy="stopGroup")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id")
     */
    private $line;

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
}
