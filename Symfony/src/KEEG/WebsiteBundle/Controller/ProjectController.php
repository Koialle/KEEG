<?php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KEEG\ActivityBundle\Form\ProjetType;
use KEEG\ActivityBundle\Entity\Projet;

class ProjectController extends Controller
{
    public function indexAction(){

        //Une liste de News ou Articles ou Temoignages en dur (disons des Articles) :
        $listeItems = $this->getDoctrine()->getManager()->getRepository('KEEGActivityBundle:Projet')->findAll();//->findAllWithCategory();

        return $this->render('KEEGWebsiteBundle:Projet:index.html.twig', array('listeItems' => $listeItems));
	}

	public function viewAction($id){

		$project = $this->getDoctrine()->getManager()->getRepository('KEEGActivityBundle:Projet')->find($id);

		return $this->render('KEEGWebsiteBundle:Projet:view.html.twig', array(
			'project' => $project
		));

	}

    public function addAction(Request $request)
    {
        //Création de l'entité Projet
        $project = new Projet();

        //Création du formulaire à partir de ProjetType et de $project
        $form = $this->get('form.factory')->create(new ProjetType(), $project);

        //Hydratation de $project si la requète est un POST
        $form->handleRequest($request);

        //persistation de $project si la requete est un POST et que les champs sont valides
        if($form->isValid())
        {
            //on persiste l'objet grace à l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            //on crée un message flash avant de rediriger la réponse vers la vue de $project
            $request->getSession()->getFlashBag()->add('admin', 'Le projet a bien été ajouté.');

            return $this->redirect($this->generateUrl('keeg_admin_projects_view', array('id' => $project->getId())));
        } 
        return $this->render('KEEGWebsiteBundle:Projet:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction($id, Request $request)
    {
        //On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        //Récupération du projet depuis la BD
        $project = $em->getRepository('KEEGActivityBundle:Projet')->find($id);

        if(null === $project){
            throw new NotFoundHttpException("Le projet d'id ".$id." n'existe pas.");
        }

        // Création du formulaire en remplissant les champs avec les attributs du projet récupéré
        $form = $this->get('form.factory')->create(new ProjetType(), $project);

        // Hydratation de $project si la requète est un POST
        $form->handleRequest($request);

        if($form->isValid())
        {
            //Pas besoin de persister, le projet existait déjà dans "l'index"
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Les modifications apportées au projet "'.$project->getTitre().'" ont bien été enregistrées.');

            return $this->redirect($this->generateUrl('keeg_admin_projects_view', array('id' => $project->getId())));
        }

        return $this->render('KEEGWebsiteBundle:Projet:edit.html.twig', array(
            'form' => $form->createView(),
            'project' => $project
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('KEEGActivityBundle:Projet')->find($id);

        if(null === $project){
            throw new NotFoundHttpException("Le projet d'id ".$id." n'existe pas.");
            
        }

        $form = $this->createFormBuilder()->getForm();

        if($form->handleRequest($request)->isValid())
        {
            $em->remove($project);
            $em->flush();

            $request->getSession()->getFlashBag()->add('admin', 'Le projet a bien été supprimé.');
            return $this->redirect($this->generateUrl('keeg_website_admin'));
        }
        
        return $this->render('KEEGWebsiteBundle:Projet:delete.html.twig', array(
            'project' => $project,
            'form' => $form->createView()
        ));
    }
}