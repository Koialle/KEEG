<?php

namespace KEEG\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KEEG\ActivityBundle\Form\ProjetType;
use KEEG\ActivityBundle\Entity\Projet;

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

    public function addAction(Request $request)
    {
        //Création de l'entité Projet
        $project = new Projet();

        //Création du formulaire à partir de ProjetType et de $project
        $form = $this->get('form.factory')->create(new ProjetType(), $project);

        //Hydratation de $project si la requète est un POST et persistation de $project si la requete est un POST et que les champs sont valides
        if($form->handleRequest($request)->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $project
            $request->getSession()->getFlashBag()->add('admin', 'Le projet a bien été ajouté.');

            return $this->render('KEEGWebsiteBundle:Admin:index.html.twig');
        }

        return $this->render('KEEGActivityBundle:Projects:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        /*
        if($request->isMethod('POST'))
        {
            $request->getSession()->getFlashBag()->add('accueil', 'Le projet a bien été modifié.');
            return $this->redirect($this->generateUrl('keeg_website_homepage'));
        }

        $project = array(
            'titre' => 'Roll-a-ball',
            'id'    => $id,
            'auteur'=> 'Ophélie EOUZAN',
            'url'   => 'https://iutdoua-webetu.univ-lyon1.fr/~p1301627/Roll-a-ball_v01/Roll-a-ball_v01.html',
            'image' => 'http://i.ytimg.com/vi/_IONRdFLF38/maxresdefault.jpg',
            'contenu' => 'Un projet Unity3D basée sur le tutoriel de Roll-a-ball',
            'type'  => 'Unity3D'
        );

        return $this->render('KEEGActivityBundle:Projects:edit.html.twig', array('project' => $project));
        */
       
        //Création de l'entité Projet
        $project = new Projet();

        //Création du formulaire à partir de ProjetType et de $project
        $form = $this->get('form.factory')->create(new ProjetType, $project);

        //Hydratation de $project
        $form->handleRequest($request);

        //Persistation de $project si la requete est un POST et que les champs sont valides
        if($form->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $project
            $request->getSession()->getFlashBag()->add('notice', 'L\'annonce a bien été ajoutée.');

            return $this->redirect($this->generateUrl('keeg_forum_view', array(
                'id'    =>  $project->getId()
            )));
        }

        return $this->render('KEEGForumBundle:Advert:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id, Request $request)
    {
        if($request->isMethod('POST'))
        {
            $request->getSession()->getFlashBag()->add('accueil', 'Le projet a bien été supprimé.');
            return $this->redirect($this->generateUrl('keeg_website_homepage'));
        }
        
        return $this->render('KEEGActivityBundle:Projects:delete.html.twig');
    }
}