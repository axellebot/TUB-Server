<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Line
 *
 * @ORM\Table(name="Line")
 * @ORM\Entity
 */
class Line
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;


    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", length=11)
     */

    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=28)
     */
    private $color;


    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", length=11)
     */
    private $order;

    /**
     * @var StopGroup
     *
     * @ORM\OneToOne(targetEntity="StopGroup", mappedBy="trip")
     */
    private $stopGroup;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
