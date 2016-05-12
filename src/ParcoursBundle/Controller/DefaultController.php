<?php

namespace ParcoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ParcoursBundle:Default:index.html.twig');
    }
}
