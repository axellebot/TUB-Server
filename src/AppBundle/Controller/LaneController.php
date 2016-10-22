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
     */
    public function listAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Lane');
        $lanes = $repository->findAll();


        return $this->render('AppBundle:lane:list.html.twig', [
            'lanes'=>$lanes
        ]);
    }
}
