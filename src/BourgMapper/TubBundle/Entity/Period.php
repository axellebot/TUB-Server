<?php

namespace BourgMapper\TubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Period
 *
 * @ORM\Table(name="Period")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class Period
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     * @Serializer\Expose
     */
    private $label;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="date")
     * @Serializer\Expose
     */

    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date")
     * @Serializer\Expose
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="dayCycle", type="string", length=11)
     * @Serializer\Expose
     */
    private $dayCycle;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ScheduleGroup", mappedBy="period")
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
     * Set label
     *
     * @param string $label
     *
     * @return Period
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Period
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

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
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Period
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

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
     * Set dayCycle
     *
     * @param string $dayCycle
     *
     * @return Period
     */
    public function setDayCycle($dayCycle)
    {
        $this->dayCycle = $dayCycle;

        return $this;
    }

    /**
     * Get dayCycle
     *
     * @return string
     */
    public function getDayCycle()
    {
        return $this->dayCycle;
    }

    /**
     * Add scheduleGroup
     *
     * @param ScheduleGroup $scheduleGroup
     *
     * @return Period
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScheduleGroups()
    {
        return $this->scheduleGroups;
    }
}
