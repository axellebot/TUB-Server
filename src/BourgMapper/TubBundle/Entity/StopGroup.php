<?php

namespace BourgMapper\TubBundle\Entity;

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
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id",nullable=false)
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
     * @ORM\JoinColumn(name="stop_id", referencedColumnName="id", nullable=false)
     */
    private $stop;

    /**
     * @var Stop
     * @ORM\ManyToOne(targetEntity="Stop")
     * @ORM\JoinColumn(name="next_stop_id", referencedColumnName="id", nullable=true)
     */
    private $nextStop;

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
     * Get nextStop
     *
     * @return \BourgMapper\TubBundle\Entity\Stop
     */
    public function getNextStop()
    {
        return $this->nextStop;
    }

    /**
     * Set nextStop
     *
     * @param \BourgMapper\TubBundle\Entity\Stop $nextStop
     *
     * @return StopGroup
     */
    public function setNextStop(\BourgMapper\TubBundle\Entity\Stop $nextStop = null)
    {
        $this->nextStop = $nextStop;

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
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getScheduleGroups()
    {
        return $this->scheduleGroups;
    }
}
