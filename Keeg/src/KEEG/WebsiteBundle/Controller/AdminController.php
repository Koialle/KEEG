<?php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('KEEGWebsiteBundle:Admin:index.html.twig');
		return new Response($content);
    }
}
