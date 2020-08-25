<?php

namespace App\Controller;

use App\Entity\Fonction;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LayoutController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('layout/index.html.twig', [
            'controller_name' => 'layoutController',
        ]);
    }

    /**
     * @Route("/agenda", name="agenda")
     */
    public function agenda()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_AGENDA') {
                return $this->render('layout/agenda.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }

    /**
     * @Route("/parametre", name="parametre")
     */
    public function parametre()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_APP_SETTING') {
                return $this->render('layout/parametre.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }

    /**
     * @Route("/fiches_de_paie", name="fiches_de_paie")
     */
    public function fiches_de_paie()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_PAY') {
                return $this->render('layout/fiches_de_paie.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }

    /**
     * @Route("/gestion", name="gestion")
     */
    public function gestion()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_GED') {
                return $this->render('layout/gestion.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }

    /**
     * @Route("/reunions", name="reunions")
     */
    public function reunions()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_TEAM_MEETING') {
                return $this->render('layout/reunions.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }


    /**
     * @Route("/consultations_chantier", name="consultations_chantier")
     */
    public function consultations_chantier()
    {
        $user = $this->getUser();

        $fonction = $user->getFonction();

        $roles = $fonction->getRoles();

        foreach ($roles as $role) {

            if ($role->getName() == 'ROLE_SITE') {

                return $this->render('layout/consultations_chantier.html.twig');
            }
        }
        return $this->redirectToRoute('denied_acces');
    }

    /**
     * @Route("/acces_refuse", name="denied_acces")
     */
    public function deniedAcces()
    {
        return $this->render('layout/deniedacces.html.twig');
    }

    /**
     * @Route("/user/{id}/edit", name="user_edit_role")
     */
    public function editRoleAction(EntityManagerInterface $manager, Request $request, User $user)
    {
        $fonctionId = $request->request->get('fonction');
        $fonctionRepo = $manager->getRepository(Fonction::class);
        if (isset($fonctionId)) {

            $fonction = $fonctionRepo->find($fonctionId);
            $user->setFonction($fonction);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('home');
        }


        return $this->render('layout/editUser.html.twig');
    }
}
