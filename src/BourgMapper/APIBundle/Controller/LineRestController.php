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
     * Get Lines from Stops
     *
     * @ApiDoc(
     *  section="Lines",
     *  description="Lines of Stop",
     *  output={"class"=Line::class, "collection"=true}
     * )
     * @Get("/stops/{stop_id}/lines",name="",options={ "method_prefix" = true })
     */
    public function getAllLinesFromStopAction($stop_id)
    {
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $lines = $stopGroupRepository->findLinesOfStop($stop_id);

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }
        return array('lines' => $lines);
    }

}