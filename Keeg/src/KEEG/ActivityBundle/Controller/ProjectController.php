<?php

namespace KEEG\ActivityBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KEEG\ActivityBundle\Form\ProjetType;
use KEEG\ActivityBundle\Entity\Projet;

class ProjectController extends Controller
{
    public function indexAction(){

        //On récupère la liste des projets (sans leur catégories) :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGActivityBundle:Projet')->findAll();

        // On retourne l'index avec les projets
        return $this->render('KEEGActivityBundle:Projects:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$project = $this->getDoctrine()->getManager()->getRepository('KEEGActivityBundle:Projet')->find($id);

		if(null === $project){
			throw new NotFoundHttpException("Le projet d'id ".$id." n'existe pas.");
		}

		return $this->render('KEEGActivityBundle:Projects:view.html.twig', array(
			'project' => $project
		));

	}

	public function menuAction($limit){

        $listeItems = $this->getDoctrine()->getManager()
        	->getRepository('KEEGActivityBundle:Projet')
        	->findBy(
                array(),
                null,
                $limit
            );

		return $this->render('KEEGActivityBundle:Projects:menu.html.twig', array(
		  'listeItems' => $listeItems
		));
	}
}