<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\StopGroup;

class StopGroupRestController extends FOSRestController
{

    /**
     * @ApiDoc(
     *  description="StopGroup list",
     *  output={"class"=StopGroup::class, "collection"=true}
     * )
     */
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

    /**
     * @ApiDoc(
     *  description="StopGroup",
     *  output={"class"=StopGroup::class, "collection"=false}
     * )
     */
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