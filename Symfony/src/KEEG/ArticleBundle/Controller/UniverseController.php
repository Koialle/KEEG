<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UniverseController extends Controller
{
	public function indexAction(Request $request){

        //return new Response('Coucou !');

        $session = $request->getSession();

        $session->getFlashBag()->add('accueil', 'La page de l\'Univers de l\'informatique n\'est pas encore disponible, merci de revenir plus tard.');

        return $this->redirect($this->generateUrl('keeg_website_homepage'));
	}

}