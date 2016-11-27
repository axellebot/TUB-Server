<?php
namespace BourgMapper\TubBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use TubBundle\Entity\Schedule;


/**
 * Class ScheduleRestController
 * @package TubBundle\API\Controller
 */
class ScheduleRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Schedule list",
     *  output={"class"=Schedule::class, "collection"=true}
     * )
     * @Get("/schedules",name="",options={ "method_prefix" = true})
     */
    public function getAllSchedulesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedules = $repository->findAll();

        if (!is_array($schedules)) {
            throw $this->createNotFoundException();
        }
        return array('schedules' => $schedules);
    }

    /**
     * @ApiDoc(
     *  description="Schedule",
     *  output={"class"=Schedule::class, "collection"=false}
     * )
     * @Get("/schedules/{schedule_id}",name="",options={ "method_prefix" = true})
     */
    public function getAllScheduleAction($schedule_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedule = $repository->find($schedule_id);

        if (!is_object($schedule)) {
            throw $this->createNotFoundException();
        }
        return array('schedule' => $schedule);
    }
}