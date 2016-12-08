<?php

namespace BourgMapper\TubBundle\Controller;

use BourgMapper\TubBundle\Entity\StopGroup;
use BourgMapper\TubBundle\Form\Type\LinePathType;
use BourgMapper\TubBundle\Model\LinePath;
use Doctrine\ORM\Repository;
use BourgMapper\TubBundle\Entity\Repository\StopGroupRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Form\Type\StopType;

/**
 * Class LinePathController
 * @package BourgMapper\TubBundle\Controller
 *
 * @Route("/linepaths")
 */
class LinePathController extends Controller
{
    /**
     * List all Paths
     *
     * @Route("", name="line_path_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('TubBundle:LinePath:list.html.twig', array());
    }

    /**
     * Create Stop
     *
     * @Route("/create", name="line_path_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $linePath = new LinePath();

        $form = $this->createForm(LinePathType::class, $linePath);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stopGroups = array();

            $stops = $linePath->getStops();
            $reversedStops = array_reverse($stops);

            $nextStopGroup = null;
            foreach ($reversedStops as $i => $stop) {
                $stopGroup = new StopGroup();
                $stopGroup->setWay($linePath->getWay());
                $stopGroup->setLine($linePath->getLine());
                $stopGroup->setStop($stop);
                $stopGroup->setNextStopGroup($nextStopGroup);
                $nextStopGroup = $stopGroup;
                array_unshift($stopGroups, $stopGroup);
            }

            $em = $this->getDoctrine()->getManager();

            foreach ($stopGroups as $stopGroup) {
                $em->persist($stopGroup);
            }

            $em->flush();

            return $this->redirectToRoute("line_path_list");
        }

        return $this->render('TubBundle:LinePath:create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/update/{line_id}/{way}", name="line_path_update", requirements={"line_id" = "\d+","way"="O|I"})
     * @param Request $request
     * @param $line_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function udpateAction(Request $request, $line_id, $way)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        /** @var  StopGroupRepository $stopGroupRepository */
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');
    }
}
