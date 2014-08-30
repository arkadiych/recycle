<?php

namespace Mm\RecycleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Mm\RecycleBundle\Entity\Batterypack;
use Mm\RecycleBundle\Form\Type\BatterypackType;

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
        $batterypack = new Batterypack();

        $form = $this->createForm(new BatterypackType(), $batterypack);

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
