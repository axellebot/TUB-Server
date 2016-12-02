<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\APIBundle\Entity\Client;
use BourgMapper\TubBundle\Form\Type\OAuthClientType;


/**
 * Class OAuthController
 * @package BourgMapper\TubBundle\Controller
 *
 * @Route("/oauth")
 */
class OAuthController extends Controller
{

    /**
     * @Route("", name="oauth_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:AccessToken');
        $accessTokens = $repository->findAll();

        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:AuthCode');
        $authCodes = $repository->findAll();

        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:Client');
        $clients = $repository->findAll();

        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:RefreshToken');
        $refreshTokens = $repository->findAll();

        return $this->render('TubBundle:OAuth:index.html.twig', [
            'accessTokens' => $accessTokens,
            'authCodes' => $authCodes,
            'clients' => $clients,
            'refreshTokens' => $refreshTokens
        ]);
    }


    /**
     * @Route("/clients/create", name="oauth_client_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function clientCreateAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }
        $OAuthClient = new Client();
        $form = $this->createForm(OAuthClientType::class, $OAuthClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $formLabel = $OAuthClient->getLabel();
            $formRedirectUris = $OAuthClient->getRedirectUris();
            $formAllowedGrantTypes = $OAuthClient->getAllowedGrantTypes();

            $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
            $client = $clientManager->createClient();
            $client->setLabel($formLabel);
            $client->setRedirectUris($formRedirectUris);
            $client->setAllowedGrantTypes($formAllowedGrantTypes);

            $clientManager->updateClient($client);

            return $this->redirectToRoute("oauth_index");
        }

        return $this->render('TubBundle:OAuth:oauth_client_create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/clients/update/{oauth_client_id}", name="oauth_client_update",requirements={"oauth_client_id" = "\d+"})
     * @param Request $request
     * @param $oauth_client_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function clientUpdateAction(Request $request, $oauth_client_id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $repository = $this->getDoctrine()
            ->getRepository('APIBundle:Client');
        $client = $repository->find($oauth_client_id);

        $form = $this->createForm(OAuthClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $clientManager = $this->container->get('fos_oauth_server.client_manager.default');

            $clientManager->updateClient($client);

            return $this->redirectToRoute("oauth_index");
        }

        return $this->render('TubBundle:OAuth:oauth_client_update.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
