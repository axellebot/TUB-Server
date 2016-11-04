<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Period;

class PeriodRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Period list",
     *  output={"class"=Period::class, "collection"=true}
     * )
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


    }// "get_periods"     [GET] /periods


    /**
     * @ApiDoc(
     *  description="Period",
     *  output={"class"=Period::class, "collection"=false}
     * )
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
    }// "get_period"     [GET] /period/{id}
}