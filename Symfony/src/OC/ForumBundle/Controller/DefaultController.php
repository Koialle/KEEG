<?php

namespace OC\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OCForumBundle:Default:index.html.twig', array('name' => $name));
    }
}
