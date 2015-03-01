<?php

namespace KEEG\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ActivityController extends Controller
{
    public function indexAction(Request $request)
    {
    	$content = $this->get('templating')->render('KEEGActivityBundle:Activities:index.html.twig');
		return new Response($content);
    }
	
	public function questionnairesAction(Request $request)
    {
		return $this->render('KEEGActivityBundle:Activities:questionnaires.html.twig');
    }
	
	public function quizzInfoAction(Request $request)
	{
		return $this->render('KEEGActivityBundle:Activities:quizzInfo.html.twig');
	}
	
	public function quizzCursusAction(Request $request)
	{
		return $this->render('KEEGActivityBundle:Activities:quizzCursus.html.twig');
	}
	
	public function quizzCompetencesAction(Request $request)
	{
		return $this->render('KEEGActivityBundle:Activities:quizzCompetences.html.twig');
	}
	
	public function quizzDomainesAction(Request $request)
	{
		return $this->render('KEEGActivityBundle:Activities:quizzDomaines.html.twig');
	}
	
}
