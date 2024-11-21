<?php

namespace App\Controller;

use App\Form\InscriptionForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route("/inscription", name: "inscription")]
    function inscription(Request $req)
    {
        $user = new User();

        // Création du formulaire a partir de la classe InscriptionForm
        $inscriptionForm = $this->createForm(InscriptionForm::class, $user);

        // récupérer les données du corps de la requêtte
        $inscriptionForm->handleRequest($req);

        // Tester si le formulaire est soumis et validé
        if ($inscriptionForm->isSubmitted() && $inscriptionForm->isValid()) {

            // L'objet user sera automatiquement iriguer avec les données du formulaire
            dump($user);
        }

        // Retourner la vue avec le formulaire
        return $this->render(
            'inscription.html.twig',
            ['formulaire' => $inscriptionForm->createView()]
        );
    }
}

class User
{
    private $email;
    private $nom;
    private $prenom;
    private $genre;

    public function getNom() {
        return $this->nom;
      }

      public function getPrenom() {
        return $this->prenom;
      }

      public function getGenre() {
        return $this->genre;
      }
    
    
      public function getEmail() {
        return $this->email;
      }
    
}

// Exercice:
// Créer une méthode qui construit le formulaire et le retourne
// Utiliser la méthode dans la route.




