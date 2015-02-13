<?php

namespace KEEG\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KEEGArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}
