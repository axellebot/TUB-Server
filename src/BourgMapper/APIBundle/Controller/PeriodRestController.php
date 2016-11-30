<?php
namespace BourgMapper\APIBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use BourgMapper\TubBundle\Entity\Period;


/**
 * Class PeriodRestController
 * @package BourgMapper\APIBundle\Controller
 */
class PeriodRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Period list",
     *  output={"class"=Period::class, "collection"=true}
     * )
     * @Get("/periods",name="",options={ "method_prefix" = true })
     */
    public function getAllPeriodsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Period');
        $periods = $repository->findAll();

        if (!is_array($periods)) {
            throw $this->createNotFoundException();
        }

        return array('periods'=>$periods);
    }

    /**
     * @ApiDoc(
     *  description="Period",
     *  output={"class"=Period::class, "collection"=false}
     * )
     * @Get("/periods/{period_id}",name="",options={ "method_prefix" = true})
     */
    public function getPeriodByIdAction($period_id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Period');
        $period = $repository->find($period_id);

        if (!is_object($period)) {
            throw $this->createNotFoundException();
        }

        return array('period'=>$period);
    }
}