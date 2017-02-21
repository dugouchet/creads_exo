<?php

namespace CA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CAUserBundle:Default:index.html.twig');
    }
}
