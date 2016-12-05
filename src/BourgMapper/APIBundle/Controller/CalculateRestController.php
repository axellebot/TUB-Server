<?php
namespace BourgMapper\APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use BourgMapper\TubBundle\Entity\StopGroup;


/**
 * Class CalculateRestController
 * @package BourgMapper\APIBundle\Controller
 */
class CalculateRestController extends FOSRestController
{
    /**
     * Get Path Stop to Stop
     *
     * @ApiDoc(
     *  section="Calculate",
     *  description="Paths"
     * )
     * @Get("/calculate/paths/{departure_stop_id}/{arrival_stop_id}",name="",options={ "method_prefix" = true })
     */
    public function getPathsFromStopToStopByIdAction($departure_stop_id, $arrival_stop_id)
    {
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');
        $paths = $stopGroupRepository->getPathsFromStopToStopById($departure_stop_id, $arrival_stop_id);

        return array('paths' => $paths);
    }

}