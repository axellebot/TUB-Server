<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Form\Type\StopType;

class StopController extends Controller
{
    /**
     * @Route("/stops", name="stop_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Stop');
        $stops = $repository->findAll();


        return $this->render('TubBundle:Stop:list.html.twig', [
            'stops' => $stops
        ]);
    }


    /**
     * @Route("admin/stops/delete/{stop_id}", name="stop_delete", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $stop_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $stop_id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Stop');
        $stop = $repository->find($stop_id);
        $em->remove($stop);
        $em->flush();

        return $this->redirectToRoute('stop_list');
    }

    /**
     * @Route("admin/stops/create/", name="stop_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $stop = new Stop();
        $form = $this->createForm(StopType::class,$stop);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                throw $this->createAccessDeniedException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($stop);
            $em->flush();

            return $this->redirectToRoute("stop_list");
        }

        return $this->render('TubBundle:Stop:create.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("admin/stops/update/{stop_id}", name="stop_update", requirements={"stop_id" = "\d+"})
     * @param Request $request
     * @param $stop_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request,$stop_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Stop');
        $stop = $repository->find($stop_id);
        $form = $this->createForm(StopType::class,$stop);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                throw $this->createAccessDeniedException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute("stop_list");
        }

        return $this->render('TubBundle:Stop:update.html.twig',array(
            'form'=>$form->createView()
        ));
    }


    /**
     * @Route("/stops/{stop_id}", name="stop_detail", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $stop_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request,$stop_id){

    }
}
