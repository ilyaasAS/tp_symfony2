<?php

namespace App\Repository;

use App\Entity\ListTaches;
use App\Entity\Tache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine, Tache::class);
    }

    // Methode pour enregistrer un Message dans la BDD
    public function sauvegarder(Tache $nouvelleTache, ?bool $isSave)
    {
        // Créer la requete SQL
        $this->getEntityManager()->persist($nouvelleTache);
        if ($isSave) {
            // Execute la requete
            $this->getEntityManager()->flush();
        }
        return $nouvelleTache;
    }
}
