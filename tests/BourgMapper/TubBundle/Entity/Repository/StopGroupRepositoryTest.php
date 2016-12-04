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
     * @var \BourgMapper\TubBundle\Entity\Repository\StopGroupRepository
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


    public function testGetOrderOfStopById()
    {
        echo "testGetOrderOfStopById\n";
        $order = $this->stopGroupRepository->getOrderOfStopById(1, StopGroupRepository::WAY_OUTBOUND, 138);
        echo "Order : $order\n";
    }

    public function testGetStopIdOfOrder()
    {
        echo "testGetStopIdOfOrder\n";
        $stop_id = $this->stopGroupRepository->getStopIdByOrder(1, StopGroupRepository::WAY_OUTBOUND, 1);
        echo "Stop id : $stop_id\n";
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

    public function testGetNextStopIdOfStop()
    {
        echo "testGetNextStopIdOfStopById\n";
        $stop_id = $this->stopGroupRepository->getNextStopIdOfStopById(1, StopGroupRepository::WAY_OUTBOUND, 138);
        echo "Next Stop : $stop_id\n";
    }

    public function testGetPreviousStopId()
    {
        echo "testGetPreviousStopIdOfStopById\n";
        $stop_id = $this->stopGroupRepository->getPreviousStopIdOfStopById(1, StopGroupRepository::WAY_OUTBOUND, 138);
        echo "Previous Stop : $stop_id\n";
    }

    public function testGetDirectAccessibleStopIdsOfStopById()
    {
        echo "testGetDirectAccessibleStopIdsOfStopById\n";
        $accessibleStopIds = $this->stopGroupRepository->getDirectAccessibleStopIdsOfStopById(30);
        var_dump($accessibleStopIds);
    }

    public function testGetDijkstraSchema()
    {
        echo "testGetDijkstraSchema";
        $schema = $this->stopGroupRepository->getDijkstraSchema();
        var_dump($schema);
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