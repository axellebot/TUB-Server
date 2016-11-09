<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Line;

/**
 * Class LineRestController
 * @package AppBundle\API\Controller
 */
class LineRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Line list",
     *  output={"class"=Line::class, "collection"=true}
     * )
     * @Get("/lines",name="",options={ "method_prefix" = true })
     */
    public function getAllLinesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $lines = $repository->findAll();

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }

        return array('lines' => $lines);
    }

    /**
     * @ApiDoc(
     *  description="Line",
     *  output={"class"=Line::class, "collection"=true}
     * )
     * @Get("/lines/{line_id}",name="",options={ "method_prefix" = true })
     */
    public function getLineAction($line_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $line = $repository->find($line_id);

        if (!is_object($line)) {
            throw $this->createNotFoundException();
        }

        return array('line' => $line);
    }
}