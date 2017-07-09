<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
	public function indexAction(){

            //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
        $listeItems = $this->get('doctrine.orm.entity_manager')->getRepository('KEEGArticleBundle:News')->findAll();

        return $this->render('KEEGArticleBundle:News:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$news = $this->get('doctrine.orm.entity_manager')->getRepository('KEEGArticleBundle:News')->find($id);

        if($news === null){
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
        }

		return $this->render('KEEGArticleBundle:News:view.html.twig', array(
			'news' => $news
		));

	}

	public function menuAction($limit){
		
		$listeItems = $this->get('doctrine.orm.entity_manager')
			->getRepository('KEEGArticleBundle:News')
			->findBy(
				array(),
				null,
				$limit
			);

		return $this->render('KEEGArticleBundle:News:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}