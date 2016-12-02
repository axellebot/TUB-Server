<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Period;
use BourgMapper\TubBundle\Form\Type\PeriodType;

class  PeriodController extends Controller {

    /**
     * Get All Period
     *
     * @Route("/admin/periods", name="period_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Period');
        $periods = $repository->findAll();


        return $this->render('TubBundle:Period:list.html.twig', [
            'periods' => $periods
        ]);
    }


    /**
     * Create Period
     *
     * @Route("/admin/periods/create", name="period_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $period = new Period();
        $form = $this->createForm(PeriodType::class,$period);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($period);
            $em->flush();

            return $this->redirectToRoute("period_list");
        }

        return $this->render('TubBundle:Period:create.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * Update Period
     *
     * @Route("/admin/periods/update/{period_id}", name="period_update", requirements={"period_id" = "\d+"})
     * @param Request $request
     * @param $period_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request,$period_id)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Period');
        $period = $repository->find($period_id);
        $form = $this->createForm(PeriodType::class,$period);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute("period_list");
        }

        return $this->render('TubBundle:Period:update.html.twig',array(
            'form'=>$form->createView()
        ));
    }

}