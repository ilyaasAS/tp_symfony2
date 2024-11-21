<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{

    #[Route("/notes", name: "notes", methods: ["GET"])]
    function notes()
    {
        return $this->render('notes.html.twig');
    }
}

// Exercice:
// 1. Créer une classe pour le formulaire: MatieresForm
// 2. Ajouter des champ: nom complet, matieres, note
// 3. Utiliser afficher le formulaire dans le controller et la vue