<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Stop;

/**
 * Class StopRestController
 * @package AppBundle\API\Controller
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
    public function getStopsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
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
     * @Get("/stops/{id}",name="",options={ "method_prefix" = true })
     */
    public function getStopAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
        $stop = $repository->find($id);

        if (!is_object($stop)) {
            throw $this->createNotFoundException();
        }
        return array('stop' => $stop);
    }
}