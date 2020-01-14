<?php
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace App\Form;

use Symfony\Component\Form\AbstractType;

//form types
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('naam', TextType::class, [
                'attr' => [
                    'placeholder' => 'Naam'

                ]
            ])
            ->add('email', EmailType::class , [
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-control'
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
            ])
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Form',
        ]);
    }
}