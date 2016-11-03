<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Stop;

class StopController extends FOSRestController
{
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