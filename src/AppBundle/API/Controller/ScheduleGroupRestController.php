<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\ScheduleGroup;

class ScheduleGroupRestController extends FOSRestController
{
    public function getSchedulegroupsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:ScheduleGroup');
        $scheduleGroups = $repository->findAll();

        if (!is_array($scheduleGroups)) {
            throw $this->createNotFoundException();
        }

        return array('schedulegroups'=>$scheduleGroups);


    }// "get_schedulegroups"     [GET] /schedulegroups

    public function getSchedulegroupAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:ScheduleGroup');
        $scheduleGroup = $repository->find($id);

        if (!is_object($scheduleGroup)) {
            throw $this->createNotFoundException();
        }

        return array('stopgroup'=>$scheduleGroup);
    }// "get_schedulegroup"     [GET] /scheduleGroup/{id}
}