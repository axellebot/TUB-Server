<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lane
 *
 * @ORM\Table(name="Lane")
 * @ORM\Entity
 */
class Lane
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=28)
     */
    private $color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Path", mappedBy="lane")
     */
    private $paths;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stopInfos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Lane
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Lane
     */
    public function setColor($color)
    {
        $this->color = $color;

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
     * Add path
     *
     * @param \AppBundle\Entity\Path $path
     *
     * @return Lane
     */
    public function addPath(\AppBundle\Entity\Path $path)
    {
        $this->paths[] = $path;

        return $this;
    }

    /**
     * Remove path
     *
     * @param \AppBundle\Entity\Path $path
     */
    public function removePath(\AppBundle\Entity\Path $path)
    {
        $this->paths->removeElement($path);
    }

    /**
     * Get paths
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaths()
    {
        return $this->paths;
    }
}
