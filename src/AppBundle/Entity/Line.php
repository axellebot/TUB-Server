<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Line
 *
 * @ORM\Table(name="Line")
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class Line
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
     * @var int
     *
     * @ORM\Column(name="number", type="integer", length=11)
     * @Serializer\Expose
     */

    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=28)
     * @Serializer\Expose
     */
    private $color;


    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", length=11)
     * @Serializer\Expose
     */
    private $order;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="StopGroup", mappedBy="line")
     * @ORM\OrderBy({"way" = "DESC","order" = "ASC"})
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
     * Add stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     *
     * @return Line
     */
    public function addStopGroup(\AppBundle\Entity\StopGroup $stopGroup)
    {
        $this->stopGroups[] = $stopGroup;

        return $this;
    }

    /**
     * Remove stopGroup
     *
     * @param \AppBundle\Entity\StopGroup $stopGroup
     */
    public function removeStopGroup(\AppBundle\Entity\StopGroup $stopGroup)
    {
        $this->stopGroups->removeElement($stopGroup);
    }

    /**
     * Get stopGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStopGroups()
    {
        return $this->stopGroups;
    }
}
