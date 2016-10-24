<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\LaneType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Lane;

class LaneController extends Controller
{
    /**
     * @Route("/lane", name="lane_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {

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
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Lane');
        $lane = $repository->find($id);
        $em->remove($lane);
        $em->flush();

        return $this->redirectToRoute('lane_list');
    }

    /**
     * @Route("admin/lane/create/", name="lane_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $lane = new Lane();
        $form = $this->createForm(LaneType::class,$lane);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                throw $this->createAccessDeniedException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($lane);
            $em->flush();

            return $this->redirectToRoute("lane_list");
        }

        return $this->render('AppBundle:lane:create.html.twig',array(
            'form'=>$form->createView()
        ));
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
