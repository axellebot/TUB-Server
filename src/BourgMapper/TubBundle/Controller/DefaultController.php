<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('TubBundle:default:index.html.twig', [
        ]);
    }

    /**
     * @Route("/admin",name="admin_index")
     */
    public function adminIndexAction(Request $request){
        return $this->render('TubBundle:default:admin.html.twig',array(

        ));
    }
}
