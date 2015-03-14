<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
	public function indexAction(){

        //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Article')->findAll();

        return $this->render('KEEGArticleBundle:Article:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$article = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Article')->find($id);

        if(null === $article){
            throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
        }

		return $this->render('KEEGArticleBundle:Article:view.html.twig', array(
			'article' => $article
		));

	}

	public function menuAction($limit){
		
        $listeItems = $this->getDoctrine()->getManager()
            ->getRepository('KEEGArticleBundle:Article')
            ->findBy(
                array(),
                null,
                $limit
            );

		return $this->render('KEEGArticleBundle:Article:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}