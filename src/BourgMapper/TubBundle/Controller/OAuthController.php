<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OAuthController extends Controller
{
    /**
     * @Route("/admin/oauth/access_tokens", name="oauth_access_token")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accessTokenlistAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:AccessToken');
        $accessTokens = $repository->findAll();


        return $this->render('TubBundle:oauth:access_token_list.html.twig', [
            'accessTokens' => $accessTokens
        ]);
    }

    /**
     * @Route("/admin/oauth/codes", name="oauth_code")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function codeListAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:AuthCode');

        $authCodes = $repository->findAll();


        return $this->render('TubBundle:oauth:code_list.html.twig', [
            'authCodes' => $authCodes
        ]);
    }

    /**
     * @Route("/admin/oauth/clients", name="oauth_client")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function clientListAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:Client');
        $clients = $repository->findAll();

        return $this->render('TubBundle:oauth:client_list.html.twig', [
            'clients' => $clients
        ]);
    }

    /**
     * @Route("/admin/oauth/clients", name="oauth_client")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refreshTokenListAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:RefreshToken');

        $refreshTokens = $repository->findAll();

        return $this->render('TubBundle:oauth:client_list.html.twig', [
            'refreshTokens' => $refreshTokens
        ]);
    }
}
