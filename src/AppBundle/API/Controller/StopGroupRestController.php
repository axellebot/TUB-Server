<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\StopGroup;


/**
 * Class StopGroupRestController
 * @package AppBundle\API\Controller
 */
class StopGroupRestController extends FOSRestController
{

    /**
     * @ApiDoc(
     *  description="StopGroup list",
     *  output={"class"=StopGroup::class, "collection"=true}
     * )
     * @Get("/stopgroups",name="",options={ "method_prefix" = true})
     */
    public function getStopgroupsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:StopGroup');
        $stopGroups = $repository->findAll();

        if (!is_array($stopGroups)) {
            throw $this->createNotFoundException();
        }
        return array('stopgroups' => $stopGroups);
    }

    /**
     * @ApiDoc(
     *  description="StopGroup",
     *  output={"class"=StopGroup::class, "collection"=false}
     * )
     * @Get("/stopgroups/{id}",name="",options={ "method_prefix" = true})
     */
    public function getStopgroupAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:StopGroup');
        $stopGroup = $repository->find($id);

        if (!is_object($stopGroup)) {
            throw $this->createNotFoundException();
        }
        return array('stopgroup' => $stopGroup);
    }
}