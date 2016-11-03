<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Line
 *
 * @ORM\Table(name="Line")
 * @ORM\Entity
 * @ExclusionPolicy("all")
 */
class Line
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     * @Expose
     */
    private $label;


    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", length=11)
     * @Expose
     */

    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=28)
     * @Expose
     */
    private $color;


    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", length=11)
     * @Expose
     */
    private $order;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StopGroup", mappedBy="line")
     */
    private $stopGroups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopGroups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Line
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Line
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Line
     */
    public function setColor($color)
    {
        $this->color = $color;

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
     * Set order
     *
     * @param integer $order
     *
     * @return Line
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Set stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     *
     * @return Line
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
