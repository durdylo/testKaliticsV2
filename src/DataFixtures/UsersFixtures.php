<?php

namespace App\DataFixtures;

use App\Entity\Fonction;
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
        $fonctionRepo = $manager->getRepository(Fonction::class);

        $superAdmin = $fonctionRepo->find(1);
        $direction = $fonctionRepo->find(2);
        $ressourcesH = $fonctionRepo->find(3);
        $mangerTeam = $fonctionRepo->find(4);
        $operateur = $fonctionRepo->find(5);

        $user1 = new User;
        $user1->setEmail("user1@mail.fr");
        $user1->setFonction($superAdmin);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            "Password1."
        ));

        $manager->persist($user1);

        $user2 = new User;
        $user2->setEmail("user2@mail.fr");
        $user2->setFonction($direction);
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2,
            "Password2."
        ));

        $manager->persist($user2);

        $user3 = new User;
        $user3->setEmail("user3@mail.fr");
        $user3->setFonction($ressourcesH);

        $user3->setPassword($this->passwordEncoder->encodePassword(
            $user3,
            "Password3."
        ));

        $manager->persist($user3);


        $user4 = new User;
        $user4->setEmail("user4@mail.fr");
        $user4->setFonction($mangerTeam);

        $user4->setPassword($this->passwordEncoder->encodePassword(
            $user4,
            "Password4."
        ));

        $manager->persist($user4);

        $user5 = new User;
        $user5->setEmail("user5@mail.fr");
        $user5->setFonction($operateur);

        $user5->setPassword($this->passwordEncoder->encodePassword(
            $user5,
            "Password5."
        ));

        $manager->persist($user5);


        $manager->flush();
    }
}
