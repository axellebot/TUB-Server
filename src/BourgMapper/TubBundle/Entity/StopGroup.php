<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * StopGroup
 *
 * @ORM\Table(name="join_line_stop")
 * @ORM\Entity(repositoryClass="BourgMapper\TubBundle\Entity\Repository\StopGroupRepository")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\AccessorOrder("custom", custom = {"id","Line","way", "order","StopId"})
 */
class StopGroup
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
     * @var Line
     *
     * @ORM\ManyToOne(targetEntity="Line", inversedBy="stopGroups")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id",nullable=false,onDelete="CASCADE")
     */
    private $line;

    /**
     * @var string
     *
     * @ORM\Column(name="way",type="string",length=1, nullable=false,options={"fixed":true, "comment":"O for Outbound or I for Inbound"})
     * @Serializer\Expose
     */
    private $way;

    /**
     * @var Stop
     *
     * @ORM\ManyToOne(targetEntity="Stop", inversedBy="stopGroups")
     * @ORM\JoinColumn(name="stop_id", referencedColumnName="id", nullable=false,onDelete="CASCADE")
     */
    private $stop;

    /**
     * @var StopGroup
     * @ORM\OneToOne(targetEntity="StopGroup",cascade={"remove"})
     * @ORM\JoinColumn(name="previous_stop_group_id", referencedColumnName="id", nullable=true,onDelete="SET NULL")
     */
    private $previousStopGroup;

    /**
     * @var StopGroup
     * @ORM\OneToOne(targetEntity="StopGroup",cascade={"remove"})
     * @ORM\JoinColumn(name="next_stop_group_id", referencedColumnName="id", nullable=true,onDelete="SET NULL")
     */
    private $nextStopGroup;

    /**
     * Start Date
     *
     * @var \DateTime $dateStart
     *
     * @ORM\Column(name="dateStart", type="date")
     * @Serializer\Expose
     */
    private $dateStart;

    /**
     * End Date
     *
     * @var \DateTime $dateEnd
     *
     * @ORM\Column(name="dateEnd", type="date")
     * @Serializer\Expose
     */
    private $dateEnd;


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
        $this->scheduleGroups = new ArrayCollection();
    }

    //Custom Functions
    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("stop_id")
     */
    public function getStopId()
    {
        return $this->getStop()->getId();
    }

    /**
     * Get stop
     *
     * @return Stop
     */
    public function getStop()
    {
        return $this->stop;
    }

    //Generated Functions

    /**
     * Set stop
     *
     * @param Stop $stop
     *
     * @return StopGroup
     */
    public function setStop(Stop $stop = null)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * @return integer
     * @Serializer\Type("integer")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("line_id")
     */
    public function getLineId()
    {
        return $this->getLine()->getId();
    }

    /**
     * Get line
     *
     * @return Line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set line
     *
     * @param Line $line
     *
     * @return StopGroup
     */
    public function setLine(Line $line = null)
    {
        $this->line = $line;

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
     * Get sens
     *
     * @return string
     */
    public function getWay()
    {
        return $this->way;
    }

    /**
     * Set sens
     *
     * @param string $way
     *
     * @return StopGroup
     */
    public function setWay($way)
    {
        $this->way = $way;

        return $this;
    }

    /**
     * Get nextStopGroup
     *
     * @return StopGroup
     */
    public function getNextStopGroup()
    {
        return $this->nextStopGroup;
    }

    /**
     * Set nextStopGroup
     *
     * @param StopGroup $nextStopGroup
     *
     * @return StopGroup
     */
    public function setNextStopGroup(StopGroup $nextStopGroup = null)
    {
        $this->nextStopGroup = $nextStopGroup;

        return $this;
    }

    /**
     * Add scheduleGroup
     *
     * @param ScheduleGroup $scheduleGroup
     *
     * @return StopGroup
     */
    public function addScheduleGroup(ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups[] = $scheduleGroup;

        return $this;
    }

    /**
     * Remove scheduleGroup
     *
     * @param ScheduleGroup $scheduleGroup
     */
    public function removeScheduleGroup(ScheduleGroup $scheduleGroup)
    {
        $this->scheduleGroups->removeElement($scheduleGroup);
    }

    /**
     * Get scheduleGroups
     *
     * @return ArrayCollection
     */
    public function getScheduleGroups()
    {
        return $this->scheduleGroups;
    }

    /**
     * Get previousStopGroup
     *
     * @return StopGroup
     */
    public function getPreviousStopGroup()
    {
        return $this->previousStopGroup;
    }

    /**
     * Set previousStopGroup
     *
     * @param StopGroup $previousStopGroup
     *
     * @return StopGroup
     */
    public function setPreviousStopGroup(StopGroup $previousStopGroup = null)
    {
        $this->previousStopGroup = $previousStopGroup;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return StopGroup
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return StopGroup
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }
}
