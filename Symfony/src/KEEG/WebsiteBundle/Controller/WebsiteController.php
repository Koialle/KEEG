<?php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('KEEGWebsiteBundle:Advert:index.html.twig');
		return new Response($content);
    }

    public function contactAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->getFlashBag()->add('accueil', 'La page de contact n\'est pas encore disponible, merci de revenir plus tard.');

    	return $this->redirect($this->generateUrl('keeg_website_homepage'));
    }
}
