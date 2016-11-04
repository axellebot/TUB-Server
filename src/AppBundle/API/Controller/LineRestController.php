<?php
namespace AppBundle\API\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Line;


class LineRestController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  description="Line list",
     *  output={"class"=Line::class, "collection"=true}
     * )
     */
    public function getLinesAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $lines = $repository->findAll();

        if (!is_array($lines)) {
            throw $this->createNotFoundException();
        }

        return array('lines' => $lines);


    }// "get_lines"     [GET] /lines

    /**
     * @ApiDoc(
     *  description="Line",
     *  output={"class"=Line::class, "collection"=true}
     * )
     */
    public function getLineAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');
        $line = $repository->find($id);

        if (!is_object($line)) {
            throw $this->createNotFoundException();
        }

        return array('line' => $line);
    }// "get_line"     [GET] /line/{id}
}