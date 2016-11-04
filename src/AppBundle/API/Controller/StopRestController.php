<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Stop;

class StopRestController extends FOSRestController
{

    /**
     * @ApiDoc(
     *  description="Stop list",
     *  output={"class"=Stop::class, "collection"=true}
     * )
     */
    public function getStopsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
        $stops = $repository->findAll();

        if (!is_array($stops)) {
            throw $this->createNotFoundException();
        }

        return array('stops'=>$stops);
    }// "get_stops"     [GET] /stops

    /**
     * @ApiDoc(
     *  description="Stop",
     *  output={"class"=Stop::class, "collection"=false}
     * )
     */
    public function getStopAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
        $stop = $repository->find($id);

        if (!is_object($stop)) {
            throw $this->createNotFoundException();
        }

        return array('stop'=>$stop);
    }// "get_stop"     [GET] /stop/{id}
}