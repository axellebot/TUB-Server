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
     * @ApiDoc(
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
     * @ApiDoc(
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
     * @ApiDoc(
     *  description="Stops of Line",
     *  output={"class"=Stop::class, "collection"=true}
     * )
     * @Get("/lines/{line_id}/stops",name="",options={ "method_prefix" = true })
     */
    public function getAllStopsFromLineAction($line_id)
    {
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $stops = $stopGroupRepository->findStopsOfLine($line_id);

        if (!is_array($stops)) {
            throw $this->createNotFoundException();
        }
        return array('stops' => $stops);
    }

}