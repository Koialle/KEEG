<?php

namespace KEEG\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KEEGForumBundle:Default:index.html.twig', array('name' => $name));
    }
}
