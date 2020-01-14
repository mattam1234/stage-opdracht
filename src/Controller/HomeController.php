<?php

namespace App\Controller;

//includes de form entity
use App\Entity\From\Form;
use Symfony\Component\HttpFoundation\Response;
//types for the form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $form = $this->createFormBuilder()
            ->add('naam', TextType::class, [
                'attr' => [
                    'placeholder' => 'Naam'

                ]
            ])
            ->add('email', EmailType::class , [
                'attr' => [
                    'placeholder' => 'Email'
                ]
            ])
            ->add('telefoonnummer', TelType::class , [
                'attr' => [
                    'placeholder' => 'Telefoonnummer'
                ]
            ])
            ->add('verstuur', SubmitType::class , [
                'attr' => [
                    'class' => 'btn btn-success'
                    ]
            ])->getForm();

        $em = $this->getDoctrine()->getManager();

        $entity = new Form();

        $form = $this->createForm(new FromType(), $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {


            $entity = $form->getData();
//            $entity->setNaam($form->get($form->getData('naam')));
            print_r($entity);
           $em->persist($entity);
            $em->flush();

            return new Response('Succesvol verstuurd');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Form' => $form->createView(),
        ]);
    }
}
