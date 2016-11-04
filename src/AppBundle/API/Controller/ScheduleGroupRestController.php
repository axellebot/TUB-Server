<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\ScheduleGroup;

class ScheduleGroupRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="ScheduleGroup list",
     *  output={"class"=ScheduleGroup::class, "collection"=true}
     * )
     */
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

    /**
     * @ApiDoc(
     *  description="ScheduleGroup",
     *  output={"class"=ScheduleGroup::class, "collection"=false}
     * )
     */
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