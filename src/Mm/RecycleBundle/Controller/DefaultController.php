<?php

namespace Mm\RecycleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MmRecycleBundle:Default:index.html.twig', array('name' => $name));
    }
}
