<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UniverseController extends Controller
{
	public function indexAction(Request $request){

        $session = $request->getSession();

        $content = $this->get('templating')->render('KEEGArticleBundle:IUTInfo:index.html.twig');
		return new Response($content);
	}

}