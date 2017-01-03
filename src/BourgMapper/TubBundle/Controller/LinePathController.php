<?php

namespace BourgMapper\TubBundle\Controller;

use BourgMapper\TubBundle\Entity\Line;
use Doctrine\ORM\Repository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\TubBundle\Entity\Stop;
use BourgMapper\TubBundle\Form\Type\StopType;
use BourgMapper\TubBundle\Entity\StopGroup;
use BourgMapper\TubBundle\Form\Type\LinePathType;
use BourgMapper\TubBundle\Model\LinePath;
use BourgMapper\TubBundle\Entity\Repository\StopGroupRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

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
        
        $linePath = new LinePath();

        $linePath->setDateStart(new \DateTime());
        $linePath->setDateEnd(new \DateTime());
        $line = new Line();
        $line->setLabel("Line label");
        $linePath->setLine($line);
        $linePath->setWay("O");

        /** @var StopGroupRepository $repository */
        $repository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $repository->findBy(array(
        ));

        return $this->render('TubBundle:LinePath:list.html.twig', array(
            "linePaths"=>array($linePath)
        ));
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
            $em = $this->getDoctrine()->getManager();

            $linePath->persist($em);

            $em->flush();

            return $this->redirectToRoute("line_path_list");
        }

        return $this->render('TubBundle:LinePath:create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Recreate Action - Recreate LinePath
     *
     * @Route("/recreate/{line_id}/{way}", name="line_path_recreate", requirements={"line_id" = "\d+","way"="O|I"})
     * @Route("/recreate/{line_id}/{way}/{date}", name="line_path_recreate_with_date", requirements={"line_id" = "\d+","way"="O|I"})
     * @ParamConverter("date", options={"format": "Y-m-d"})
     * @param Request $request
     * @param string $line_id
     * @param string $way
     * @param \DateTime $date
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function recreateAction(Request $request, $line_id, $way, \DateTime $date = null)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $date = (isset($date)) ? $date : new DateTime();

        /** @var  StopGroupRepository $stopGroupRepository */
        $stopGroupRepository = $this->getDoctrine()
            ->getRepository('TubBundle:StopGroup');

        $stopGroup = $stopGroupRepository->getFirstStopGroupFromLinePathByLineIdAndWay($line_id, $way);

        $linePath = LinePath::initWithStopGroup($stopGroup);

        $form = $this->createForm(LinePathType::class, $linePath);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //delete StopGroups
            $em->remove($stopGroup);

            $linePath->persist($em);

            $em->flush();
            return $this->redirectToRoute("line_path_list");
        }

        return $this->render('TubBundle:LinePath:recreate.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
