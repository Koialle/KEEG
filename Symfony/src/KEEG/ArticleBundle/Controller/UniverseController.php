<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UniverseController extends Controller
{
	public function indexAction(){

        $content = $this->get('templating')->render('KEEGArticleBundle:Universe:index.html.twig');
		return new Response($content);
	}

	public function iutAction(){

        $content = $this->get('templating')->render('KEEGArticleBundle:Universe:iut.html.twig');
		return new Response($content);
	}

	public function metierAction(){

        $content = $this->get('templating')->render('KEEGArticleBundle:Universe:debouches.html.twig');
		return new Response($content);
	}

	public function formationAction(){

        $content = $this->get('templating')->render('KEEGArticleBundle:Universe:formations.html.twig');
		return new Response($content);
	}

	public function loisirAction(){

        $content = $this->get('templating')->render('KEEGArticleBundle:Universe:loisirs.html.twig');
		return new Response($content);
	}

}