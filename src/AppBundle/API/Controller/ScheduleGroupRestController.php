<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\ScheduleGroup;


/**
 * Class ScheduleGroupRestController
 * @package AppBundle\API\Controller
 */
class ScheduleGroupRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="ScheduleGroup list",
     *  output={"class"=ScheduleGroup::class, "collection"=true}
     * )
     * @Get("/schedulegroups",name="",options={ "method_prefix" = true})
     */
    public function getAllScheduleGroupsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:ScheduleGroup');
        $scheduleGroups = $repository->findAll();

        if (!is_array($scheduleGroups)) {
            throw $this->createNotFoundException();
        }

        return array('schedulegroups'=>$scheduleGroups);


    }

    /**
     * @ApiDoc(
     *  description="ScheduleGroup",
     *  output={"class"=ScheduleGroup::class, "collection"=false}
     * )
     * @Get("/schedulegroups/{schedule_group_id}",name="",options={ "method_prefix" = true})
     */
    public function getScheduleGroupByIdAction($schedule_group_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:ScheduleGroup');
        $scheduleGroup = $repository->find($schedule_group_id);

        if (!is_object($scheduleGroup)) {
            throw $this->createNotFoundException();
        }
        return array('schedulegroup'=>$scheduleGroup);
    }
}