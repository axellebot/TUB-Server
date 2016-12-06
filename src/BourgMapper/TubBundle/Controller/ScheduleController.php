<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Schedule;
use BourgMapper\TubBundle\Form\Type\ScheduleType;


/**
 * Class ScheduleController
 * @package BourgMapper\TubBundle\Controller
 *
 * @Route("/schedules", name="schedule_list")
 */
class ScheduleController extends Controller
{
    /**
     * @Route("", name="schedule_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedules = $repository->findAll();


        return $this->render('TubBundle:Schedule:list.html.twig', [
            'schedules' => $schedules
        ]);
    }

    /**
     * @Route("/create", name="schedule_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($schedule);
            $em->flush();

            return $this->redirectToRoute("schedule_list");
        }

        return $this->render('TubBundle:Schedule:create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/update/{schedule_id}", name="schedule_update", requirements={"schedule_id" = "\d+"})
     * @param Request $request
     * @param $schedule_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request, $schedule_id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedule = $repository->find($schedule_id);
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute("schedule_list");
        }

        return $this->render('TubBundle:Schedule:update.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/delete/{schedule_id}", name="schedule_delete", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $schedule_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $schedule_id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Schedule');
        $schedule = $repository->find($schedule_id);
        $em->remove($schedule);
        $em->flush();

        return $this->redirectToRoute('schedule_list');
    }
}
