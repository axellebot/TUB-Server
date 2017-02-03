<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class DefaultController
 * @package BourgMapper\TubBundle\Controller
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('TubBundle:default:index.html.twig', [
        ]);
    }

    /**
     * @Route("admin",name="admin_index")
     */
    public function adminIndexAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('TubBundle:default:admin.html.twig',array(

        ));
    }
    
    /**
     * @Route("sitemap",name="sitemap")
     */
    public function sitemapAction(Request $request){
        $response = $this->render('TubBundle:default:sitemap.xml.twig', [
        ]);
        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
        return $response;
    }
}
