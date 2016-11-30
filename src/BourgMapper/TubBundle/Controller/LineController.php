<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Line;
use BourgMapper\TubBundle\Form\Type\LineType;

class LineController extends Controller
{
    /**
     * @Route("/lines", name="line_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Line');
        $lines = $repository->findAll();


        return $this->render('TubBundle:Line:list.html.twig', [
            'lines' => $lines
        ]);
    }


    /**
     * @Route("admin/lines/delete/{line_id}", name="line_delete", requirements={"id" = "\d+"})
     * @param Request $request
     * @param $line_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $line_id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Line');
        $line = $repository->find($line_id);
        $em->remove($line);
        $em->flush();

        return $this->redirectToRoute('line_list');
    }

    /**
     * @Route("admin/lines/create/", name="line_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $line = new Line();
        $form = $this->createForm(LineType::class,$line);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                throw $this->createAccessDeniedException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($line);
            $em->flush();

            return $this->redirectToRoute("line_list");
        }

        return $this->render('TubBundle:Line:create.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("admin/lines/update/{line_id}", name="line_update", requirements={"line_id" = "\d+"})
     * @param Request $request
     * @param $line_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request,$line_id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:Line');
        $line = $repository->find($line_id);
        $form = $this->createForm(LineType::class,$line);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                throw $this->createAccessDeniedException();
            }

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute("line_list");
        }

        return $this->render('TubBundle:Line:update.html.twig',array(
            'form'=>$form->createView()
        ));
    }
}
