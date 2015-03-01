<?php

namespace KEEG\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    public function indexAction(){

        //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
        $listeItems = array(
            array(
                'titre' => 'Roll-a-ball',
                'id'    => 1,
                'auteur'=> 'Ophélie EOUZAN',
                'url'   => 'https://iutdoua-webetu.univ-lyon1.fr/~p1301627/Roll-a-ball_v01/Roll-a-ball_v01.html',
                'image' => 'http://i.ytimg.com/vi/_IONRdFLF38/maxresdefault.jpg',
                'contenu' => 'Un projet Unity3D basée sur le tutoriel de Roll-a-ball',
                'type'  => 'Unity3D'
            ),
            array(
                'titre' => 'Space-Shooter',
                'id'    => 2,
                'auteur'=> 'Ophélie EOUZAN',
                'url'   => 'file:///C:/Users/Oph%C3%A9lie/Documents/Mes%20projets/Space%20shooter/Builds/Space-shooter_v01/Space-shooter_v01.html',
				'image' => 'http://unity3d.com/sites/default/files/space-shooter-header_0.jpg',	
                'contenu' => 'Un projet Unity3D basée sur le tutoriel de Space-shooter',
                'type'  => 'Unity3D'
            )
         );


        return $this->render('KEEGActivityBundle:Projects:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$project = array(
                'titre' => 'Roll-a-ball',
                'id'    => $id,
                'auteur'=> 'Ophélie EOUZAN',
                'url'   => 'https://iutdoua-webetu.univ-lyon1.fr/~p1301627/Roll-a-ball_v01/Roll-a-ball_v01.html',
                'image' => 'http://i.ytimg.com/vi/_IONRdFLF38/maxresdefault.jpg',
                'contenu' => 'Un projet Unity3D basée sur le tutoriel de Roll-a-ball',
                'type'  => 'Unity3D'
         );

		return $this->render('KEEGActivityBundle:Projects:view.html.twig', array(
			'project' => $project
		));

	}

	public function menuAction($limit){
		
		// On fixe en dur une liste ici, bien entendu par la suite
		// on la récupérera depuis la BDD !

        $listeItems = array(
            array(
                'titre' => 'Roll-a-ball',
                'id'    => 1,
                'auteur'=> 'Ophélie EOUZAN',
                'url'   => 'https://iutdoua-webetu.univ-lyon1.fr/~p1301627/Roll-a-ball_v01/Roll-a-ball_v01.html',
                'image' => 'http://i.ytimg.com/vi/_IONRdFLF38/maxresdefault.jpg',
                'contenu' => 'Un projet Unity3D basée sur le tutoriel de Roll-a-ball',
                'type'  => 'Unity3D'
            ),
            array(
                'titre' => 'Space-Shooter',
                'id'    => 2,
                'auteur'=> 'Ophélie EOUZAN',
                'url'   => 'file:///C:/Users/Oph%C3%A9lie/Documents/Mes%20projets/Space%20shooter/Builds/Space-shooter_v01/Space-shooter_v01.html',
				'image' => 'https://lh5.ggpht.com/p3YR042jjBrvlpxlZTy1r6Ezst3uhJV1uIcTLSgkS5DIRZOR1Pv4Fp9gtBnJD4ILHbw=h900',	
                'contenu' => 'Un projet Unity3D basée sur le tutoriel de Space-shooter',
                'type'  => 'Unity3D'
            )
         );

		return $this->render('KEEGActivityBundle:Projects:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}