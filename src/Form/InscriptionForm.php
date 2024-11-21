<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class InscriptionForm extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('POST');
        $builder->setAttributes(['class' => "MonID"]);
        $builder
        ->add('email',
        EmailType::class,
        ['attr' => ['placeholder' => "Entrer votre email"],
        "constraints" => [
            new Assert\Email([ 'message' =>'Nom obligatoire']),

        ]]
        )
        ->add(
            'nom',
            TextType::class,
            [
                "label" => "Nom de famille",
                "attr" => ['placeholder' => "Entrez votre nom"]
            ]
        )
        ->add(
            'prenom',
            TextType::class,
            [
                "label" => "Prénom",
                "attr" => ['placeholder' => "Entrez votre Prénom"]
            ]
        )
        ->add(
            'genre',
            ChoiceType::class,
            ['choices' => ['Masculin' => 'm', 'Féminin' => 'f',]]
        )

        ->add('Envoyer', SubmitType::class, ["attr" => ['class' => "button"]]);

       $builder->get('nom')->setRequired(false);
       $builder->get('nom')->setRequired(false);
    }
}