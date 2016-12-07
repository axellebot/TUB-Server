<?php
namespace BourgMapper\TubBundle\Model;
use BourgMapper\TubBundle\Entity\Line;
use BourgMapper\TubBundle\Entity\Stop;
use JMS\Serializer\Annotation as Serializer;

/**
 * Path
 *
 * @Serializer\ExclusionPolicy("all")
 */
class LinePath
{
    /**
     * @var  Line $line
     *
     * @Serializer\Expose
     */
    private $line;

    /**
     * @var  string $way
     *
     * @Serializer\Expose
     */
    private $way;

    /**
     * Ordered Stops
     *
     * @var  array $stops
     *
     * @Serializer\Expose
     */
    private $stops;

    /**
     * @return Line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param Line $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return string
     */
    public function getWay()
    {
        return $this->way;
    }

    /**
     * @param string $way
     */
    public function setWay($way)
    {
        $this->way = $way;
    }

    /**
     * @return array
     */
    public function getStops()
    {
        return $this->stops;
    }

    /**
     * @param array $stops
     */
    public function setStops($stops)
    {
        $this->stops = $stops;
    }


}