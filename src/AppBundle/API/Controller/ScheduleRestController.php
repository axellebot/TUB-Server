<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Schedule;

class ScheduleRestController extends FOSRestController
{
    public function getSchedulesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule');
        $schedules = $repository->findAll();

        if (!is_array($schedules)) {
            throw $this->createNotFoundException();
        }

        return array('schedules'=>$schedules);


    }// "get_schedules"     [GET] /schedules

    public function getScheduleAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule');
        $schedule = $repository->find($id);

        if (!is_object($schedule)) {
            throw $this->createNotFoundException();
        }

        return array('schedule'=>$schedule);
    }// "get_schedule"     [GET] /schedule/{id}
}