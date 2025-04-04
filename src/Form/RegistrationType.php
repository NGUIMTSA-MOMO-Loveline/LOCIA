<?php

// src/Form/RegistrationType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ajouter des champs au formulaire
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // Spécifier que ce formulaire est pour l'entité User
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
