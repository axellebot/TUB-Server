<?php
namespace BourgMapper\APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use BourgMapper\TubBundle\Entity\Line;

/**
 * Class LineRestController
 * @package BourgMapper\APIBundle\Controller
 */
class LineRestController extends FOSRestController
{
    /**
     * Get Lines
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Lines",
     *  description="Line list",
     *  output={"class"=Line::class, "collection"=true}
     * )
     * @Get("/lines",name="",options={ "method_prefix" = true })
     */
    public function getAllLinesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Line');
        $lines = $repository->findAll();

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }

        return array('lines' => $lines);
    }

    /**
     * Get Line by id
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Lines",
     *  description="Line",
     *  output={"class"=Line::class, "collection"=false}
     * )
     * @Get("/lines/{line_id}",name="",options={ "method_prefix" = true })
     */
    public function getLineAction($line_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Line');
        $line = $repository->find($line_id);

        if (!is_object($line)) {
            throw $this->createNotFoundException();
        }

        return array('line' => $line);
    }

    /**
     * Get Stops of Line
     *
     * @ApiDoc(
     *  section="Lines",
     *  description="Stops of Line",
     *  output={"class"=Stop::class, "collection"=true}
     * )
     * @Get("/lines/{line_id}/stops",name="",options={ "method_prefix" = true })
     */
    public function getAllStopsFromLineAction($line_id)
    {
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $stops = $stopGroupRepository->getStopsFromLineId($line_id);

        if (!is_array($stops)) {
            throw $this->createNotFoundException();
        }

        return array('stops' => $stops);
    }
}