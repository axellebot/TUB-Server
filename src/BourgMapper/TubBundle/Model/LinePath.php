<?php
namespace BourgMapper\TubBundle\Model;

use BourgMapper\TubBundle\Entity\Line;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Entity\StopGroup;
use Doctrine\ORM\EntityManager;
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
     * Constructor
     *
     * @return LinePath
     * @param StopGroup $stopGroup
     */
    public static function initWithStopGroup($stopGroup)
    {
        $instance = new self();

        $instance->setLine($stopGroup->getLine());
        $instance->setWay($stopGroup->getWay());

        $stopsOrdered = array();
        while ($stopGroup != null) {
            array_push($stopsOrdered, $stopGroup->getStop());
            $stopGroup=$stopGroup->getNextStopGroup();
        }
        $instance->setStops($stopsOrdered);

        return $instance;
    }

    /**
     * Constructor
     *
     * @return LinePath
     * @param array $stopGroups
     */
    public static function initWithStopGroups($stopGroups)
    {
        $instance = new self();

        $instance->setLine($stopGroups[0]->getLine());
        $instance->setWay($stopGroups[0]->getWay());

        $stopsOrdered = array();
        foreach ($stopGroups as $stopGroup){
            array_push($stopsOrdered, $stopGroup->getStop());
        }
        $instance->setStops($stopsOrdered);

        return $instance;
    }


    /**
     * Save LinePath
     *
     * @param EntityManager $em
     */
    public function persist($em){
        $stopGroups = array();
        $stops = $this->getStops();
        /** @var Stop $stop */
        foreach ($stops as $stop) {
            $stopGroup = new StopGroup();
            $stopGroup->setWay($this->getWay());
            $stopGroup->setLine($this->getLine());
            $stopGroup->setStop($stop);
            array_push($stopGroups, $stopGroup);
        }

        /**
         * @var integer $i
         * @var StopGroup $stopGroup
         */
        foreach ($stopGroups as $i => $stopGroup) {
            $previousStopGroup = (isset($stopGroups[$i - 1])) ? $stopGroups[$i - 1] : null;
            $nextStopGroup = (isset($stopGroups[$i + 1])) ? $stopGroups[$i + 1] : null;

            $stopGroup->setPreviousStopGroup($previousStopGroup);
            $stopGroup->setNextStopGroup($nextStopGroup);
        }

        foreach ($stopGroups as $stopGroup) {
            $em->persist($stopGroup);
        }
    }



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