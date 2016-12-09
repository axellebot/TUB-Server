<?php
namespace BourgMapper\TubBundle\Model;

use BourgMapper\TubBundle\Entity\Line;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Entity\StopGroup;
use Doctrine\ORM\EntityManager;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

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
     * Start Date
     *
     * @var \DateTime $dateStart
     * @Serializer\Expose
     */
    private $dateStart;

    /**
     * End Date
     *
     * @var DateTime $dateEnd
     * @Serializer\Expose
     */
    private $dateEnd;


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
            $stopGroup = $stopGroup->getNextStopGroup();
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
        /** @var StopGroup $firstStopGroup */
        $firstStopGroup = $stopGroups[0];
        $instance->setLine($firstStopGroup->getLine());
        $instance->setWay($firstStopGroup->getWay());
        $instance->setDateStart($firstStopGroup->getDateStart());
        $instance->setDateEnd($firstStopGroup->getDateEnd());

        $stopsOrdered = array();
        foreach ($stopGroups as $stopGroup) {
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
    public function persist($em)
    {
        $stopGroups = array();
        $stops = $this->getStops();
        /** @var Stop $stop */
        foreach ($stops as $stop) {
            $stopGroup = new StopGroup();
            $stopGroup->setWay($this->getWay());
            $stopGroup->setLine($this->getLine());
            $stopGroup->setStop($stop);
            $stopGroup->setDateStart($this->getDateStart());
            $stopGroup->setDateEnd($this->getDateEnd());
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
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param \DateTime $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }
}