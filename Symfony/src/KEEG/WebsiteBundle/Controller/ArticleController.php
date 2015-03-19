<?php

// src/KEEG/ArticleBundle/Controller/ArticleController.php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KEEG\ArticleBundle\Form\ArticleType;
use KEEG\ArticleBundle\Form\ArticleEditType;
use KEEG\ArticleBundle\Entity\Article;

class ArticleController extends Controller
{
	public function indexAction(){

        //Une liste d'articles récupérés depuis la BD :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Article')->findAll();//->findAllWithCategory();

        return $this->render('KEEGWebsiteBundle:Article:index.html.twig', array('listeItems' => $listeItems));
    }

    public function viewAction($id){

        $article = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Article')->find($id);

        if(null === $article){
            throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
        }

        return $this->render('KEEGWebsiteBundle:Article:view.html.twig', array(
            'article' => $article
        ));

    }

    public function addAction(Request $request)
    {
        //Création de l'entité Article
        $article = new Article();

        //Création du formulaire à partir de ArticleType et de $article
        $form = $this->get('form.factory')->create(new ArticleType(), $article);

        //Hydratation de $article si la requète est un POST
        $form->handleRequest($request);

        //persistation de $article si la requete est un POST et que les champs sont valides
        if($form->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $article
            $request->getSession()->getFlashBag()->add('admin', 'L\'article a bien été ajouté.');

            return $this->redirect($this->generateUrl('keeg_admin_articles_view', array('id' => $article->getId())));
        } 
        return $this->render('KEEGWebsiteBundle:Article:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        //On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        //Récupération de l'article depuis la BD
        $article = $em->getRepository('KEEGArticleBundle:Article')->find($id);

        if(null === $article){
            throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
        }

        // Création du formulaire en remplissant les champs avec les attributs de l'article récupéré
        $form = $this->get('form.factory')->create(new ArticleEditType(), $article);

        // Hydratation de $article si la requète est un POST
        $form->handleRequest($request);

        if($form->isValid())
        {
            //Pas besoin de persister, l'article existait déjà dans "l'index"
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Les modifications apportées à l\'article "'.$article->getTitre().'" ont bien été enregistrées.');

            return $this->redirect($this->generateUrl('keeg_admin_articles_view', array('id' => $article->getId())));
        }

        return $this->render('KEEGWebsiteBundle:Article:edit.html.twig', array(
            'form' => $form->createView(),
            'article' => $article
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('KEEGArticleBundle:Article')->find($id);

        if(null === $article){
            throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
            
        }

        $form = $this->createFormBuilder()->getForm();

        if($form->handleRequest($request)->isValid())
        {
            $em->remove($article);
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'L\'article a bien été supprimé.');
            return $this->redirect($this->generateUrl('keeg_admin_articles'));
        }
        
        return $this->render('KEEGWebsiteBundle:Article:delete.html.twig', array(
            'article' => $article,
            'form' => $form->createView()
        ));
    }
}