<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TemoignageController extends Controller
{
	public function indexAction(){

            //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
            $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Temoignage')->findAll();

            return $this->render('KEEGArticleBundle:Temoignage:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$temoignage = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Temoignage')->find($id);

        if(null === $temoignage){
            throw new NotFoundHttpException("Le temoignage d'id ".$id." n'existe pas.");
        }

		return $this->render('KEEGArticleBundle:Temoignage:view.html.twig', array(
			'temoignage' => $temoignage
		));

	}

	public function menuAction($limit){
		
        $listeItems = $this->getDoctrine()->getManager()
        	->getRepository('KEEGArticleBundle:Temoignage')
        	->findBy(
        		array(),
        		null,
        		$limit
        	);

		return $this->render('KEEGArticleBundle:Temoignage:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}