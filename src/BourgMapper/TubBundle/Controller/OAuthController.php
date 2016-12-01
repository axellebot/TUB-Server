<?php

namespace BourgMapper\TubBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BourgMapper\APIBundle\Entity\Client;
use BourgMapper\TubBundle\Form\Type\OAuthClientType;

class OAuthController extends Controller
{

    /**
     * @Route("/admin/oauth", name="oauth_index")
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
     * @Route("/admin/oauth/clients/create", name="oauth_client_create")
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
}
