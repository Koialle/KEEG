<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TemoignageController extends Controller
{
	public function indexAction(){
		$listeTemoignages = array(
			array(
				'temoin' => 'Yvette',
				'id'    => 1,
				'content'   =>  'Super cet IUT, j\'adore <3',
				'date'  => new \Datetime()
				),
			array(
				'temoin' => 'Benjamin',
				'id'    => 2,
				'content'   =>  'Très bon encadrement de la part des professeurs',
				'date'  => new \Datetime()
				),
			array(
				'temoin' => 'Kathia',
				'id'    => 3,
				'content'   =>  'Je regrette encore, j\'aurais du partir faire de la communication',
				'date'  => new \Datetime()
				)
		);

		return $this->render('KEEGArticleBundle:Article:index.html.twig', array('section' => 'Temoignages', 'listeTemoignages' => $listeTemoignages));
	}

	public function viewAction($id){

		$article = array(
			'temoin' => 'Yvette',
			'id'    => 1,
			'content'   =>  'Super cet IUT, j\'adore <3',
			'date'  => new \Datetime()
        );

		return $this->render('KEEGArticleBundle:Article:view.html.twig', array('section' => 'Temoignages', 'article' => $article));

	}

	public function menuAction($limit){
		
		$listeItems = array(
		  array('id' => 1, 'temoin' => 'Yvette', 'content' => 'Super cet [...]'),
		  array('id' => 2, 'temoin' => 'Benjamin', 'content' => 'Très bon [...]'),
		  array('id' => 3, 'temoin' => 'Kathia', 'content' => 'Je regrette [...]')
		);

		return $this->render('KEEGArticleBundle:Article:menu.html.twig', array('section' => 'Temoignages', 'listeItems' => $listeItems));
	}
}