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
}
