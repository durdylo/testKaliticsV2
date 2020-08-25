<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UsersFixtures extends Fixture

{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {


        $user1 = new User;
        $user1->setEmail("user1@mail.fr");
        $user1->setRoles(['ROLE_SUPER_ADMIN']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            "password1"
        ));

        $manager->persist($user1);

        $user2 = new User;
        $user2->setEmail("user2@mail.fr");
        $user2->setRoles(['ROLE_DIRECTION']);
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2,
            "password2"
        ));

        $manager->persist($user2);

        $user3 = new User;
        $user3->setEmail("user3@mail.fr");
        $user3->setRoles(['ROLE_RH']);
        $user3->setPassword($this->passwordEncoder->encodePassword(
            $user3,
            "password3"
        ));

        $manager->persist($user3);


        $user4 = new User;
        $user4->setEmail("user4@mail.fr");
        $user4->setRoles(['ROLE_MANAGER_EQUIPE']);
        $user4->setPassword($this->passwordEncoder->encodePassword(
            $user4,
            "password4"
        ));

        $manager->persist($user4);

        $user5 = new User;
        $user5->setEmail("user5@mail.fr");
        $user5->setRoles(['ROLE_OPERATEUR']);
        $user5->setPassword($this->passwordEncoder->encodePassword(
            $user5,
            "password5"
        ));

        $manager->persist($user5);


        $manager->flush();
    }
}
