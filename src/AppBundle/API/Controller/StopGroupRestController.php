<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\StopGroup;

class StopGroupRestController extends FOSRestController
{
    public function getStopgroupsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:StopGroup');
        $stopGroups = $repository->findAll();

        if (!is_array($stopGroups)) {
            throw $this->createNotFoundException();
        }

        return array('stopgroups'=>$stopGroups);


    }// "get_stopgroups"     [GET] /stopgroups

    public function getStopgroupAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:StopGroup');
        $stopGroup = $repository->find($id);

        if (!is_object($stopGroup)) {
            throw $this->createNotFoundException();
        }

        return array('stopgroup'=>$stopGroup);
    }// "get_stopgroup"     [GET] /stopgroup/{id}
}