<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class MatieresForm extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => "Entrer votre email"],
                'constraints' => [new Assert\Email(['message' => 'Email invalide'])]
            ])
            ->add('nom', TextType::class, [
                'label' => "Nom de famille",
                'attr' => ['placeholder' => "Entrez votre nom"],
                'required' => false
            ])
            ->add('prenom', TextType::class, [
                'label' => "Prénom",
                'attr' => ['placeholder' => "Entrez votre prénom"],
                'required' => false
            ])
            ->add('genre', ChoiceType::class, [
                'label' => 'Genre',
                'choices' => ['Masculin' => 'm', 'Féminin' => 'f'],
                'placeholder' => 'Choisissez votre genre'
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => "button"]
            ]);
    }
}
