<?php

namespace App\Entity;

use App\Repository\ListTachesRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListTachesRepository::class)]
class ListTaches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private DateTime $date;

    #[ORM\OneToMany(targetEntity: Tache::class, mappedBy: "listTache", cascade: ['persist', 'remove'])]
    private $taches;


    function ajouteTache(Tache $nouvelleTache)
    {
        $nouvelleTache->setListTache($this);
        $this->taches->add($nouvelleTache);
        return $this;
    }

    function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    //Getteur / Accesseur
    public function getTitle()
    {
        return $this->title;
    }

    // Setteur / Mutateur
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTaches()
    {
        return $this->taches;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}

