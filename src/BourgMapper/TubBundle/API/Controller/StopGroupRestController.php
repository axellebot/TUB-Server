<?php
namespace BourgMapper\TubBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use BourgMapper\TubBundle\Entity\StopGroup;
use BourgMapper\TubBundle\Entity\Repository\StopGroupRepository;


/**
 * Class StopGroupRestController
 * @package TubBundle\API\Controller
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
    public function getAllStopGroupsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');
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
     * @Get("/stopgroups/{stop_group_id}",name="",options={ "method_prefix" = true})
     */
    public function getStopGroupByIdAction($stop_group_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');
        $stopGroup = $repository->find($stop_group_id);

        if (!is_object($stopGroup)) {
            throw $this->createNotFoundException();
        }
        return array('stopgroup' => $stopGroup);
    }
}