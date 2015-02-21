<?php

namespace KEEG\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name, Request $request)
    {
    	/*
        return $this->render('KEEGActivityBundle:Default:index.html.twig', array('name' => $name));
        */
        $session = $request->getSession();

        $session->getFlashBag()->add('accueil', 'La page des activités n\'est pas encore disponible, merci de revenir plus tard.');

        return $this->redirect($this->generateUrl('keeg_website_homepage'));
    }
}
