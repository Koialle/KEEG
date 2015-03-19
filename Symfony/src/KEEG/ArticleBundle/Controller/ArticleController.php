<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php
namespace KEEG\ArticleBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
	
	public function addAction(Request $request){
		if($request->isMethod('POST')){
			$request->getSession()->getFlashBag()->add('accueil', 'Article bien ajouté');
			return $this->redirect($this->generateUrl('keeg_website_homepage'));
		}
		return $this->render('KEEGArticleBundle:Article:add.html.twig');
	
	}
	
	public function editAction(Request $request) {
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('accueil', 'Article modifié');
			return $this->redirect($this->generateUrl('keeg_website_homepage'));
		}
		return $this->render('KEEGArticleBundle:Article:edit.html.twig');
		
	}
	
	public function deleteAction(Request $request) {
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('accueil', 'Article supprimé');
			return $this->redirect($this->generateUrl('keeg_website_homepage'));
		}
		return $this->render('KEEGArticleBundle:Article:delete.html.twig');
		
		
	}
}