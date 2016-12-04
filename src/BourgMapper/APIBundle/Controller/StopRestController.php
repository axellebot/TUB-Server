<?php
namespace BourgMapper\APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Entity\Repository\StopRepository;

/**
 * Class StopRestController
 * @package BourgMapper\APIBundle\Controller
 */
class StopRestController extends FOSRestController
{
    /**
     * Get Stops
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Stops",
     *  description="Stop list",
     *  output={"class"=Stop::class, "collection"=true}
     * )
     * @Get("/stops",name="",options={ "method_prefix" = true })
     */
    public function getAllStopsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Stop');
        $stops = $repository->findAll();

        if (!is_array($stops)) {
            throw $this->createNotFoundException();
        }

        return array('stops' => $stops);
    }

    /**
     * Get Stop by id
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Stops",
     *  description="Stop",
     *  output={"class"=Stop::class, "collection"=false}
     * )
     * @Get("/stops/{stop_id}",name="",options={ "method_prefix" = true })
     */
    public function getStopByIdAction($stop_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Stop');
        $stop = $repository->find($stop_id);

        if (!is_object($stop)) {
            throw $this->createNotFoundException();
        }

        return array('stop' => $stop);
    }

    /**
     * Get Lines from Stops
     *
     * @ApiDoc(
     *  section="Stops",
     *  description="Lines of Stop",
     *  output={"class"=Line::class, "collection"=true}
     * )
     * @Get("/stops/{stop_id}/lines",name="",options={ "method_prefix" = true })
     */
    public function getAllLinesFromStopAction($stop_id)
    {
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $lines = $stopGroupRepository->getLinesOfStopById($stop_id);

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }

        return array('lines' => $lines);
    }
}