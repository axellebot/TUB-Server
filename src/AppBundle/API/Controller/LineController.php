<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Line;
use Symfony\Component\HttpFoundation\JsonResponse;


class LineController extends FOSRestController
{
    public function getLinesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $lines = $repository->findAll();

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }

        return array('lines'=>$lines);


    }// "get_lines"     [GET] /lines

    public function getLineAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $line = $repository->find($id);

        if (!is_object($line)) {
            throw $this->createNotFoundException();
        }

        return array('line'=>$line);
    }// "get_line"     [GET] /line/{id}
}