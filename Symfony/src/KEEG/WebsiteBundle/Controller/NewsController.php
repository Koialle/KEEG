<?php

// src/KEEG/WebsiteBundle/Controller/ArticleController.php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KEEG\ArticleBundle\Entity\News;
use KEEG\ArticleBundle\Form\NewsType;
use KEEG\ArticleBundle\Form\NewsEditType;

class NewsController extends Controller
{
	public function indexAction(){

        //Une liste d'articles récupérés depuis la BD :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:News')->findAll();//->findAllWithCategory();

        return $this->render('KEEGWebsiteBundle:News:index.html.twig', array('listeItems' => $listeItems));
    }

    public function viewAction($id){

        $news = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:News')->find($id);

        if(null === $news){
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
        }

        return $this->render('KEEGWebsiteBundle:News:view.html.twig', array(
            'news' => $news
        ));

    }

    public function addAction(Request $request)
    {
        //Création de l'entité News
        $news = new News();

        //Création du formulaire à partir de TemoignageType et de $news
        $form = $this->get('form.factory')->create(new NewsType(), $news);

        //Hydratation de $news si la requète est un POST
        $form->handleRequest($request);

        //persistation de $news si la requete est un POST et que les champs sont valides
        if($form->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $news
            $request->getSession()->getFlashBag()->add('admin', 'L\'actualité a bien été ajoutée.');

            return $this->redirect($this->generateUrl('keeg_admin_news_view', array('id' => $news->getId())));
        } 
        return $this->render('KEEGWebsiteBundle:News:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        //On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        //Récupération de l'actualité depuis la BD
        $news = $em->getRepository('KEEGArticleBundle:News')->find($id);

        if(null === $news){
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
        }

        // Création du formulaire en remplissant les champs avec les attributs de l'news récupéré
        $form = $this->get('form.factory')->create(new NewsEditType(), $news);

        // Hydratation de $news si la requète est un POST
        $form->handleRequest($request);

        if($form->isValid())
        {
            //Pas besoin de persister, la news existait déjà dans "l'index"
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Les modifications apportées à l\'actualité "'.$news->getTitre().'" ont bien été enregistrées.');

            return $this->redirect($this->generateUrl('keeg_admin_news_view', array('id' => $news->getId())));
        }

        return $this->render('KEEGWebsiteBundle:News:edit.html.twig', array(
            'form' => $form->createView(),
            'news' => $news
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('KEEGArticleBundle:News')->find($id);

        if(null === $news){
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
            
        }

        $form = $this->createFormBuilder()->getForm();

        if($form->handleRequest($request)->isValid())
        {
            $em->remove($news);
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'L\'actualité a bien été supprimée.');
            return $this->redirect($this->generateUrl('keeg_admin_news'));
        }
        
        return $this->render('KEEGWebsiteBundle:News:delete.html.twig', array(
            'news' => $news,
            'form' => $form->createView()
        ));
    }
}