<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public $superAdministrateur = ['ROLE_APP_SETTING', 'ROLE_PAY', 'ROLE_GED', 'ROLE_AGENDA', 'ROLE_TEAM_MEETING', 'ROLE_SITE'];
    public $direction = ['ROLE_PAY', 'ROLE_GED', 'ROLE_AGENDA', 'ROLE_TEAM_MEETING', 'ROLE_SITE'];
    public $ressourcesHumaines = ['ROLE_PAY', 'ROLE_GED', 'ROLE_AGENDA'];
    public $managerEquipes = ['ROLE_AGENDA', 'ROLE_TEAM_MEETING', 'ROLE_SITE'];
    public $operateur = ['ROLE_AGENDA'];
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Super Administrateur' => 'ROLE_SUPER_ADMIN',
                    'direction' =>  'ROLE_DIRECTION',
                    'Ressources Humaines' =>  'ROLE_RH',
                    'manager equipes ' => 'ROLE_MANAGER_EQUIPE',
                    'opérateur' =>  'ROLE_OPERATEUR',
                ],
                'multiple' => true,
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
