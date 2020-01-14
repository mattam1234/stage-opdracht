<?php

namespace App\Controller;

//includes de form entity
use App\Entity\Form;
use App\Form\FormType;
use Symfony\Component\HttpFoundation\Response;



use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="From stage opdracht")
     */
    public function index(Request $request)
    {
        $formpost = new Form();
        $form = $this->createForm(FormType::class, $formpost);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formpost);
            $em->flush();
            $response = '<div class="response">succesvol verstuurt</div>';
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
                'Form' => $form->createView(),
                'response' => $response,
            ]);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Form' => $form->createView(),
            'response' => null,
        ]);
    }
}
