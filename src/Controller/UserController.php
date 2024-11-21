<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionForm;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route("/inscription", name: "inscription", methods: ["GET", "POST"])]
    function inscription(Request $req, UserPasswordHasherInterface $passwordHashed, UserRepository $repo)
    {
        $user = new User();
        $form = $this->createForm(InscriptionForm::class);

        // utiliser la requete pour gerer le formulaire
        $form->handleRequest($req);

        // Quand le formulaire est soumis et validé:
            if ($form->isSubmitted() && $form->isValid()){
        // Hasher le mot de passe
        $plainPassword = $req->request->get('password');
        $hashedPassword = $passwordHashed->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        // Utiliser le Repository pour enregistrer l'utilisateur dans la DB
        $repo->save($user, true);
        return $this->redirectToRoute('connexion');

            }
        // créer l'entité User

        return $this->render('inscription.html.twig', ['inscriptionForm' => $form->createView()]);
    }

    #[Route("/connexion", name: "connexion")]
    function connexion()
    {

        // Rediriger l'utilisateur vers la page de profil si il est connecté
        if ($this->isGrantes('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('profil');
        }



        // Implementer le login plus tard
        $connexionFrom = $this->createForm(InscriptionForm::class);
        return $this->render('connexion.html.twig', ['connexionForm' => $connexionFrom]);
    }

    #[Route("/profile", name: "profile")]
    function profile()
    {   
        // Implementer le login plus tard
        $connexionFrom = $this->createForm(InscriptionForm::class);
        return $this->render('profile.html.twig');
    }

    #[Route("/admin", name: "admin")]
    function admin()
    {   
        // Si l'utilsateur n'est pas admin
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('profile.html.twig');
        }

        // Si l'utilisateur n'est pas admin
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('profile');
        }
        
        return $this->render('admin.html.twig')
    }
}
