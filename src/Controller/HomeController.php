<?php

namespace App\Controller;

use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\Query\Expr\From;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Routing\Annotation\Route;
//includes de form entity
use App\Entity\Form;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="From stage opdracht")
     */
    public function index()
    {
        $form = $this->createFormBuilder()
            ->add('Naam')
            ->add('Email', EmailType::class)
            ->add('Telefoonnummer', TelType::class)->getForm();


        if (!empty($_POST['Naam'])) {
            if (!empty($_POST['Email'])) {
                if (!empty($_POST['Telefoonnummer'])) {
                    $submit = new Form();

                    $submit->setNaam($_POST['Naam']);
                    $submit->setEmail($_POST['Email']);
                    $submit->setTelefoonnummer($_POST['Telefoonnummer']);

                    //link manager aan een variable
                    $em = $this->getDoctrine()->getManager();

                    //maakt een sql query aan
                    $em->presist($submit);

                    //voert de query uit
                    $em->flush();
                }
            }

        }


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Form' => $form->createView(),
        ]);
    }
}
