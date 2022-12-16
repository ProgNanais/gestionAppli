<?php

namespace App\Form;

use App\Entity\ApplicationList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('appName')
            ->add('appDateCreated')
            ->add('appDescription')
            ->add('appVersion')
            ->add('appState',ChoiceType::class, [
                'choices' => [
                    'En développement' => 'En cours de développement',
                    'En qualification' => 'En cours de qualification',
                    'En sécurisation' => 'En cours de sécurisation',
                    'En production' => 'En production',
                ],
                'preferred_choices' => ['En cours de développement'],
            ])
             ->add('appDateCreated')
             ->getForm();
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApplicationList::class,
        ]);
    }
}
