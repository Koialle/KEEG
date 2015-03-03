<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
	public function indexAction(){
		$listeNews = array(
			array(
				'titre' => 'Journée porte ouverte',
				'id'    => 1,
				'content'   =>  '26/01: Les journées portes ouvertes de l\'IUT. Venez découvrir la formation et échanger avec les étudiants.',
				'date'  => new \Datetime()
				),
			array(
				'titre' => 'News 2',
				'id'    => 2,
				'content'   =>  'Une super news.',
				'date'  => new \Datetime()
				),
			array(
				'titre' => 'News 3',
				'id'    => 3,
				'content'   =>  'A cours d\idées.',
				'date'  => new \Datetime()
				)
		);

		return $this->render('KEEGArticleBundle:Article:index.html.twig', array('section' => 'News', 'listeNews' => $listeNews));
	}

	public function viewAction($id){

		$article = array(
			'titre' => 'Journée porte ouverte',
			'id'    => 1,
			'content'   =>  '26/01: Les journées portes ouvertes de l\'IUT. Venez découvrir la formation et échanger avec les étudiants.',
			'date'  => new \Datetime()
        );

		return $this->render('KEEGArticleBundle:Article:view.html.twig', array('section' => 'News', 'article' => $article));

	}

	public function menuAction($limit){
	
		$listeItems = array(
		  array('id' => 1, 'titre' => 'Journée porte ouverte', 'content' => '26/01: Les journées [...]'),
		  array('id' => 2, 'titre' => 'News 2', 'content' => 'Une super [...]'),
		  array('id' => 3, 'titre' => 'News 3', 'content' => 'A cours [...]')
		);

		return $this->render('KEEGArticleBundle:Article:menu.html.twig', array('section' => 'News','listeItems' => $listeItems));
	}
}