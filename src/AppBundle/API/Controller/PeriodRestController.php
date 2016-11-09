<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Period;


/**
 * Class PeriodRestController
 * @package AppBundle\API\Controller
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
    public function getPeriodsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Period');
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
     * @Get("/periods/{id}",name="",options={ "method_prefix" = true})
     */
    public function getPeriodAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Period');
        $period = $repository->find($id);

        if (!is_object($period)) {
            throw $this->createNotFoundException();
        }

        return array('period'=>$period);
    }
}