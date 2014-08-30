<?php

namespace Mm\RecycleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mm\RecycleBundle\Entity\Batterypack;
use Symfony\Component\HttpFoundation\Request;

class BatterypackController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
          ->getRepository('MmRecycleBundle:Batterypack');

        $batterypacks = $repository->findAllGroupedByType();

        return $this->render('MmRecycleBundle:Batterypack:index.html.twig', array(
          'batterypacks' => $batterypacks));
    }

    public function addAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $batterypack = new Batterypack();

        $form = $this->createFormBuilder($batterypack)
          ->add('type', 'text')
          ->add('count', 'integer')
          ->add('name', 'text', array('required' => false))
          ->add('save', 'submit', array('label' => 'Create'))
          ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($batterypack);
          $em->flush();
          return $this->redirect($this->generateUrl('mm_recycle_homepage'));
        }

        return $this->render('MmRecycleBundle:Batterypack:add.html.twig', array(
          'form' => $form->createView(),
        ));
    }
}
