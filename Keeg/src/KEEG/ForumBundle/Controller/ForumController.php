<?php

namespace KEEG\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ForumController extends Controller
{
    public function indexAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->getFlashBag()->add('accueil', 'Le forum n\'est pas encore disponible, merci de revenir plus tard.');

    	return $this->redirect($this->generateUrl('keeg_website_homepage'));
    }
}
