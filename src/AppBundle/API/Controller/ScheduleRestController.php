<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Schedule;


/**
 * Class ScheduleRestController
 * @package AppBundle\API\Controller
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
    public function getSchedulesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Schedule');
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
     * @Get("/schedules/{id}",name="",options={ "method_prefix" = true})
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
    }
}