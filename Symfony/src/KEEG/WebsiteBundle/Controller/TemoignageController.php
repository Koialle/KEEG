<?php

// src/KEEG/WebsiteBundle/Controller/ArticleController.php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KEEG\ArticleBundle\Form\TemoignageType;
use KEEG\ArticleBundle\Form\TemoignageEditType;
use KEEG\ArticleBundle\Entity\Temoignage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class TemoignageController extends Controller
{

	public function indexAction(){

        //Une liste d'articles récupérés depuis la BD :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Temoignage')->findAll();//->findAllWithCategory();

        return $this->render('KEEGWebsiteBundle:Temoignage:index.html.twig', array('listeItems' => $listeItems));
    }

    public function viewAction($id){

        $temoignage = $this->getDoctrine()->getManager()->getRepository('KEEGArticleBundle:Temoignage')->find($id);

        if(null === $temoignage){
            throw new NotFoundHttpException("Le temoignage d'id ".$id." n'existe pas.");
        }

        return $this->render('KEEGWebsiteBundle:Temoignage:view.html.twig', array(
            'temoignage' => $temoignage
        ));

    }

    public function addAction(Request $request)
    {
        //Création de l'entité Temoignage
        $temoignage = new Temoignage();

        //Création du formulaire à partir de TemoignageType et de $temoignage
        $form = $this->get('form.factory')->create(new TemoignageType(), $temoignage);

        //Hydratation de $temoignage si la requète est un POST
        $form->handleRequest($request);

        //persistation de $temoignage si la requete est un POST et que les champs sont valides
        if($form->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($temoignage);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $temoignage
            $request->getSession()->getFlashBag()->add('admin', 'Le témoignage a bien été ajouté.');

            return $this->redirect($this->generateUrl('keeg_admin_temoignages_view', array('id' => $temoignage->getId())));
        } 
        return $this->render('KEEGWebsiteBundle:Temoignage:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        //On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        //Récupération de l'temoignage depuis la BD
        $temoignage = $em->getRepository('KEEGArticleBundle:Temoignage')->find($id);

        if(null === $temoignage){
            throw new NotFoundHttpException("Le témoignage d'id ".$id." n'existe pas.");
        }

        // Création du formulaire en remplissant les champs avec les attributs de l'temoignage récupéré
        $form = $this->get('form.factory')->create(new TemoignageEditType(), $temoignage);

        // Hydratation de $temoignage si la requète est un POST
        $form->handleRequest($request);

        if($form->isValid())
        {
            //Pas besoin de persister, le temoignage existait déjà dans "l'index"
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Les modifications apportées au témoignage "'.$temoignage->getTitre().'" ont bien été enregistrées.');

            return $this->redirect($this->generateUrl('keeg_admin_temoignages_view', array('id' => $temoignage->getId())));
        }

        return $this->render('KEEGWebsiteBundle:Temoignage:edit.html.twig', array(
            'form' => $form->createView(),
            'temoignage' => $temoignage
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $temoignage = $em->getRepository('KEEGArticleBundle:Temoignage')->find($id);

        if(null === $temoignage){
            throw new NotFoundHttpException("Le témoignage d'id ".$id." n'existe pas.");
            
        }

        $form = $this->createFormBuilder()->getForm();

        if($form->handleRequest($request)->isValid())
        {
            $em->remove($temoignage);
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Le témoignage a bien été supprimé.');
            return $this->redirect($this->generateUrl('keeg_admin_temoignages'));
        }
        
        return $this->render('KEEGWebsiteBundle:Temoignage:delete.html.twig', array(
            'temoignage' => $temoignage,
            'form' => $form->createView()
        ));
    }
}