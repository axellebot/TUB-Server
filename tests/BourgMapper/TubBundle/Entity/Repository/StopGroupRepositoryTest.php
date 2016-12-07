<?php

namespace tests\BourgMapper\TubBundle\Entity\Repository;

use BourgMapper\TubBundle\Entity\Repository\StopGroupRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StopGroupRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var StopGroupRepository $stopGroupRepository
     */
    private $stopGroupRepository;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->stopGroupRepository = $this->em->getRepository('TubBundle:StopGroup');
    }

    public function testGetStopsOfLineById()
    {
        echo "testGetStopsOfLineById\n";
        $stops = $this->stopGroupRepository->getStopsOfLineById(1);
        echo "Size :" . sizeof($stops) . "\n";
    }

    public function testGetStopIdsOfLineById()
    {
        echo "testGetStopIdsOfLineById\n";
        $stop_ids = $this->stopGroupRepository->getStopIdsOfLineById(1);
        echo "Size :" . sizeof($stop_ids) . "\n";
    }

    public function testGetLinesOfStopById()
    {
        echo "testGetLinesOfStopById\n";
        $lines = $this->stopGroupRepository->getLinesOfStopById(1);
        echo "Size :" . sizeof($lines) . "\n";
    }

    public function testGetLineIdsOfStopById()
    {
        echo "testGetLineIdsOfStopById\n";
        $line_ids = $this->stopGroupRepository->getLineIdsOfStopById(1);
        var_dump($line_ids);
        echo "Size :" . sizeof($line_ids) . "\n";
    }

    public function testGetDirectAccessibleStopIdsOfStopById()
    {
        echo "testGetDirectAccessibleStopIdsOfStopById\n";
        $accessibleStopIds = $this->stopGroupRepository->getDirectAccessibleStopIdsOfStopById(30);
        var_dump($accessibleStopIds);
    }

    public function testGetDijkstraSchema()
    {
        echo "testGetDijkstraSchema\n";
        $schema = $this->stopGroupRepository->getDijkstraSchema();
        var_dump($schema);
    }

    public function testGetPathsFromStopToStopById(){
        echo "testGetPathsFromStopToStopById\n";
        $shortestPath = $this->stopGroupRepository->getPathsFromStopToStopById(1, 2);
        var_dump($shortestPath);
    }

    public function testGetStopGroupsOfLineById(){
        echo "testGetStopGroupsOfLineById\n";
        $stopGroups=$this->stopGroupRepository->getStopGroupsOfLineById(1,StopGroupRepository::WAY_OUTBOUND);
        echo sizeof($stopGroups)."\n";
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }

}