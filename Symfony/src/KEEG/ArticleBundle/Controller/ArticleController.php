<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php
namespace KEEG\ArticleBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
	
	public function searchAction()
	{               
		
		$request = $this->container->get('request');
		//$form = $this->container->get('form.factory')->create(new ArticleRechercherForm());	
		
		if($request->getMethod() == 'POST')
		{
		
			
			$motcle = '';
			$motcle = $request->request->get('motcle');
			
			$em = $this->container->get('doctrine')->getEntityManager();

			//if($motcle != '')
			//{
				
				   $qb = $em->createQueryBuilder();

				   $qb->select('a')
					  ->from('KEEGArticleBundle:Article', 'a')
					  ->where("a.titre LIKE :motcle OR a.contenu LIKE :motcle")
					  ->orderBy('a.titre', 'ASC')
					  ->setParameter('motcle', '%'.$motcle.'%');
					  

				   $query = $qb->getQuery();               
				   $article = $query->getResult();
				
			if ($article == null) {
				return $this->container->get('templating')->renderResponse('KEEGArticleBundle:Article:lister2.html.twig', array(
				'article' => $article,
				));
			}
			else {
				/*return $this->container->get('templating')->renderResponse('KEEGArticleBundle:Article:lister.html.twig', array(
				'article' => $article,
				));*/
				return $this->render('KEEGArticleBundle:Article:lister.html.twig', array(
				'article' => $article,
				));
			
			}
		}
		else {
			return $this->render('KEEGArticleBundle:Article:lister3.html.twig');
		}
	}
	
}