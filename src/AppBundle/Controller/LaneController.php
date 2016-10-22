<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Lane;

class LaneController extends Controller
{
    /**
     * @Route("/lane", name="lane")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Lane');
        $lanes = $repository->findAll();


        return $this->render('AppBundle:lane:list.html.twig', [
            'lanes' => $lanes
        ]);
    }


    /**
     * @Route("admin/lane/delete/{id}", name="delete_lane", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Lane');
        $lane = $repository->find($id);
        $em->remove($lane);
        $em->flush();

        return $this->redirect('/lane');
    }
}
