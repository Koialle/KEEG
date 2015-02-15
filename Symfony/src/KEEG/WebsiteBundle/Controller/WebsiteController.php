<?php

namespace KEEG\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('KEEGWebsiteBundle:Advert:index.html.twig');
		return new Response($content);
    }
}
