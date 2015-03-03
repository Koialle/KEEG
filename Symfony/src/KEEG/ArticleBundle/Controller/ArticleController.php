<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
	public function indexAction(){
		$listeArticles = array(
			array(
				'titre' => 'Les prégugés du GEEK',
				'id'    => 1,
				'auteur'=> 'Ophélie RODRIGUES',
				'content'   =>  '"Les geeks sont soit trop maigres ou trop gros, ils ont des boutons et ils portent des lunettes. Ils passent leur temps sur leur ordinateur et du coup ne voient jamais personne. Ils n\'ont donc pas d\'amis, d\'ailleurs ils font peur aux autres." Voilà l\'image que se font certaines personnes des geeks. Ce qu\'il faut savoir, c\'est que ce n\'est pas du tout la réalité. Dans la réalité, vous et moi sommes des geeks. Oui, allez voir dans un dictionnaire le véritable sens du mot geek, ce mot désigne des personnes passionnées par leur domaine d\'activité. Et non spécifiquement des accros du jeu vidéo, cela peut également faire référence à un fou de cuisine ! Qui sait.',
				'date'  => new \Datetime()
				),
			array(
				'titre' => 'Les 5 règles d\'Or pour réussir en info',
				'id'    => 2,
				'auteur'=> 'Mélanie DUBREUIL',
				'content'   =>  'Un autre article.',
				'date'  => new \Datetime()
				),
			array(
				'titre' => 'Le Restaurant Universitaire du Campus de la Doua',
				'id'    => 3,
				'auteur'=> 'KAREN OUBARHOU',
				'content'   =>  'Encore un autre article.',
				'date'  => new \Datetime()
				)
		);


		return $this->render('KEEGArticleBundle:Article:index.html.twig', array('section' => 'Article', 'listeArticles' => $listeArticles));
	}

	public function viewAction($id){

		$article = array(
            'titre' => 'Les prégugés du GEEK',
            'id'    => $id,
            'auteur'=> 'Ophélie RODRIGUES',
            'content'   =>  '"Les geeks sont soit trop maigres ou trop gros, ils ont des boutons et ils portent des lunettes. Ils passent leur temps sur leur ordinateur et du coup ne voient jamais personne. Ils n\'ont donc pas d\'amis, d\'ailleurs ils font peur aux autres." Voilà l\'image que se font certaines personnes des geeks. Ce qu\'il faut savoir, c\'est que ce n\'est pas du tout la réalité. Dans la réalité, vous et moi sommes des geeks. Oui, allez voir dans un dictionnaire le véritable sens du mot geek, ce mot désigne des personnes passionnées par leur domaine d\'activité. Et non spécifiquement des accros du jeu vidéo, cela peut également faire référence à un fou de cuisine ! Qui sait.',
            'date'  => new \Datetime()
        );

		return $this->render('KEEGArticleBundle:Article:view.html.twig', array('section' => 'Article', 'article' => $article));

	}

	public function menuAction($limit){
		
		$listeItems = array(
		  array('id' => 1, 'titre' => 'Les prégugés du GEEK', 'content' => '"Les geeks sont soit trop [...]'),
		  array('id' => 2, 'titre' => 'Les 5 règles d\'Or pour réussir en info', 'content' => 'Un autre [...]')
		);

		return $this->render('KEEGArticleBundle:Article:menu.html.twig', array('section' => 'Article', 'listeItems' => $listeItems));
	}
}