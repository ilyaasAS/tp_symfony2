<?php

namespace App\Controller;

use App\Form\MatieresForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MatieresController extends AbstractController
{
    #[Route("/matieres", name: "matieres")]
    public function inscription(Request $req)
    {
        $form = $this->createForm(MatieresForm::class);

        // Récupérer les données de la requête
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Traitez les données comme nécessaire
            dump($data);
        }

        return $this->render('matieres.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }
}


// Exercice:
// Créer une méthode qui construit le formulaire et le retourne
// Utiliser la méthode dans la route.




