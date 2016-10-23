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
     * @Route("admin/lane/delete/{id}", name="lane_delete", requirements={"id" = "\d+"})
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

    /**
     * @Route("admin/lane/create/", name="lane_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        return $this->render('AppBundle:lane:create.html.twig', [

        ]);
    }

    /**
     * @Route("admin/lane/create_check/", name="lane_create_check")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createCheckAction(Request $request)
    {

    }

    /**
     * @Route("admin/lane/update/{id}", name="lane_update", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request,$id)
    {
        return $this->render('AppBundle:lane:update.html.twig', [

        ]);
    }
}
