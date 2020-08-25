<?php

namespace App\Form;

use App\Entity\Fonction;
use App\Entity\User;
use App\Repository\FonctionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder,  array $options)
    {



        $builder
            ->add('Fonction', EntityType::class, [
                'class' => Fonction::class,
                'choices' => [
                    "superAdmin" => $this->superAdmin
                ]
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
