<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Stop;
use AppBundle\Form\Type\StopType;

class StopController extends Controller
{
    /**
     * @Route("/stop", name="stop_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
        $stops = $repository->findAll();


        return $this->render('AppBundle:stop:list.html.twig', [
            'stops' => $stops
        ]);
    }


    /**
     * @Route("admin/stop/delete/{id}", name="stop_delete", requirements={"id" = "\d+"})
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
            ->getRepository('AppBundle:Stop');
        $stop = $repository->find($id);
        $em->remove($stop);
        $em->flush();

        return $this->redirectToRoute('stop_list');
    }

    /**
     * @Route("admin/stop/create/", name="stop_create")
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

        return $this->render('AppBundle:stop:create.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("admin/stop/update/{id}", name="stop_update", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Stop');
        $stop = $repository->find($id);
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

        return $this->render('AppBundle:stop:update.html.twig',array(
            'form'=>$form->createView()
        ));
    }


    /**
     * @Route("/stop/{id}", name="stop_detail", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request,$id){

    }
}
