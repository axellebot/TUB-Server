<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Period;

class PeriodRestController extends FOSRestController
{
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