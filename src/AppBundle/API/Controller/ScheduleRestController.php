<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Schedule;

class ScheduleRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Schedule list",
     *  output={"class"=Schedule::class, "collection"=true}
     * )
     */
    public function getSchedulesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule');
        $schedules = $repository->findAll();

        if (!is_array($schedules)) {
            throw $this->createNotFoundException();
        }

        return array('schedules' => $schedules);


    }// "get_schedules"     [GET] /schedules

    /**
     * @ApiDoc(
     *  description="Schedule",
     *  output={"class"=Schedule::class, "collection"=false}
     * )
     */
    public function getScheduleAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule');
        $schedule = $repository->find($id);

        if (!is_object($schedule)) {
            throw $this->createNotFoundException();
        }

        return array('schedule' => $schedule);
    }// "get_schedule"     [GET] /schedule/{id}
}