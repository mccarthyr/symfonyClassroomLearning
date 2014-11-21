<?php

namespace RMC\SymfonyClassroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RMCSymfonyClassroomBundle:Default:index.html.twig', array('name' => $name));
    }
}
