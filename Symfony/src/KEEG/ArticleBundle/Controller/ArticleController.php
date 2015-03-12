<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
	public function indexAction($section){
		if($section == 'Articles'){
            //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
            $listeArticles = array(
                array(
                    'titre' => 'Les prégugés du GEEK',
                    'id'    => 1,
                    'image' => null,
                    'auteur'=> 'Ophélie RODRIGUES',
                    'resume'=> 'Aujourd\'hui, le mot "geek" semble être mal interprété par la plupart des personnes hors monde informatique, c\'est pourquoi nous avons jugé nécessaire de casser les préjugés dans cet article.',
                    'contenu'   =>  '"Les geeks sont soit trop maigres ou trop gros, ils ont des boutons et ils portent des lunettes. Ils passent leur temps sur leur ordinateur et du coup ne voient jamais personne. Ils n\'ont donc pas d\'amis, d\'ailleurs ils font peur aux autres." Voilà l\'image que se font certaines personnes des geeks. Ce qu\'il faut savoir, c\'est que ce n\'est pas du tout la réalité. Dans la réalité, vous et moi sommes des geeks. Oui, allez voir dans un dictionnaire le véritable sens du mot geek, ce mot désigne des personnes passionnées par leur domaine d\'activité. Et non spécifiquement des accros du jeu vidéo, cela peut également faire référence à un fou de cuisine ! Qui sait.',
                    'date'  => new \Datetime()
                    ),
                array(
                    'titre' => 'Les 5 règles d\'Or pour réussir en info',
                    'image' => null,
                    'id'    => 2,
                    'resume' => 'blabla',
                    'auteur'=> 'Mélanie DUBREUIL',
                    'contenu'   =>  'Un autre article.',
                    'date'  => new \Datetime()
                    ),
                array(
                    'titre' => 'Le Restaurant Universitaire du Campus de la Doua',
                    'id'    => 3,
                    'image' => null,
                    'auteur'=> 'KAREN OUBARHOU',
                    'resume' => 'blabla',
                    'contenu'   =>  'Encore un autre article.',
                    'date'  => new \Datetime()
                    )
            );


            return $this->render('KEEGArticleBundle:Article:index.html.twig', array('section' => $section, 'listeItems' => $listeArticles));
        }

        return $this->render('KEEGArticleBundle:Article:index.html.twig', array('section' => $section, 'listeItems' => array()));
	}

	public function viewAction($id){

		$article = array(
            'titre' => 'Les prégugés du GEEK',
            'id'    => $id,
            'resume' => 'blabla',
            'image' => null,
            'auteur'=> 'Ophélie RODRIGUES',
            'contenu'   =>  '"Les geeks sont soit trop maigres ou trop gros, ils ont des boutons et ils portent des lunettes. Ils passent leur temps sur leur ordinateur et du coup ne voient jamais personne. Ils n\'ont donc pas d\'amis, d\'ailleurs ils font peur aux autres." Voilà l\'image que se font certaines personnes des geeks. Ce qu\'il faut savoir, c\'est que ce n\'est pas du tout la réalité. Dans la réalité, vous et moi sommes des geeks. Oui, allez voir dans un dictionnaire le véritable sens du mot geek, ce mot désigne des personnes passionnées par leur domaine d\'activité. Et non spécifiquement des accros du jeu vidéo, cela peut également faire référence à un fou de cuisine ! Qui sait.',
            'date'  => new \Datetime()
        );

		return $this->render('KEEGArticleBundle:Article:view.html.twig', array(
			'article' => $article
		));

	}

	public function menuAction($limit, $section){
		
		// On fixe en dur une liste ici, bien entendu par la suite
		// on la récupérera depuis la BDD !

        if($section == 'Articles'){
            $listeItems = array(
              array('id' => 1, 'titre' => 'Les prégugés du GEEK'),
              array('id' => 2, 'titre' => 'Les 5 règles d\'Or pour réussir en info')
              //array('id' => 3, 'titre' => 'Le Restaurant Universitaire du Campus de la Doua')
            );
        }

		return $this->render('KEEGArticleBundle:Article:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}